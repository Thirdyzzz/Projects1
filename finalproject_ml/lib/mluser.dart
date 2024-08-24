import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:finalproject_ml/home.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:finalproject_ml/users.dart';

class Mluserpage extends StatefulWidget {
  const Mluserpage({
    super.key,
  });

  @override
  State<Mluserpage> createState() => _MluserpageState();
}

class _MluserpageState extends State<Mluserpage> {
  late TextEditingController emailController;
  late TextEditingController passwordController;
  late TextEditingController namemlController;
  late TextEditingController roleController;
  late TextEditingController rankController;
  late TextEditingController imageUrlController;
  late String error;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    emailController = TextEditingController();
    passwordController = TextEditingController();
    namemlController = TextEditingController();
    roleController = TextEditingController();
    rankController = TextEditingController();
    imageUrlController = TextEditingController();
    error = "";
  }

  @override
  void dispose() {
    emailController.dispose();
    passwordController.dispose();
    namemlController.dispose();
    roleController.dispose();
    rankController.dispose();
    imageUrlController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        image: DecorationImage(
          colorFilter:
              ColorFilter.mode(Colors.black.withOpacity(0.5), BlendMode.darken),
          image: AssetImage('assets/images/ml_logo4.png'),
          fit: BoxFit.cover,
        ),
      ),
      child: Scaffold(
        backgroundColor: Colors.transparent,
        body: ListView(
          children: [
            Container(
              margin: EdgeInsets.symmetric(horizontal: 20),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  SizedBox(
                    height: 50,
                  ),
                  const Text(
                    'Resgister ML user',
                    style: TextStyle(color: Colors.white, fontSize: 28),
                    textAlign: TextAlign.center,
                  ),
                  buildTextField(emailController, 'Enter email'),
                  const SizedBox(height: 15),
                  buildTextField(passwordController, 'Enter password'),
                  const SizedBox(height: 15),
                  buildTextField(namemlController, 'Enter ml name'),
                  const SizedBox(height: 15),
                  buildTextField(roleController, 'Role'),
                  const SizedBox(height: 15),
                  buildTextField(rankController, 'ML rank'),
                  const SizedBox(height: 15),
                  buildTextField(imageUrlController, 'Enter Image of Main Hero'),
                  SizedBox(height: 15),
                 SizedBox.fromSize(
                  size: const Size(56, 56),
                  child: ClipOval(
                    child: Material(
                      color: Colors.grey,
                      child: InkWell(
                        splashColor: Colors.white,
                        onTap: () {
                          registerUser();
                        },
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: const <Widget>[
                            Icon(Icons.people), // <-- Icon
                            Text("Register"), // <-- Text
                          ],
                        ),
                      ),
                    ),
                  ),
                ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Future registerUser() async {
    showDialog(
      context: context,
      useRootNavigator: false,
      barrierDismissible: false,
      builder: (context) => const Center(
        child: CircularProgressIndicator(),
      ),
    );

    try {
      await FirebaseAuth.instance.createUserWithEmailAndPassword(
        email: emailController.text.trim(),
        password: passwordController.text.trim(),
      );
      createUser();

      setState(() {
        error = "";
      });
    } on FirebaseAuthException catch (e) {
      print(e);
      setState(() {
        error = e.message.toString();
      });
    }
    Navigator.pop(context);
  }

  Future createUser() async {
    final user = FirebaseAuth.instance.currentUser!;
    final userid = user.uid;

    final docUser = FirebaseFirestore.instance.collection('Users').doc(userid);

    final newUser = Users(
      id: userid,
      nameml: namemlController.text,
      role: roleController.text,
      rank: rankController.text,
      imageUrl: imageUrlController.text,
      
    );

    final json = newUser.toJson();
    await docUser.set(json);

    Navigator.pop(context);
  }
}

Widget buildTextField(TextEditingController controller, String labelText) {
  return Container(
    padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
    decoration: const BoxDecoration(),
    child: TextField(
      controller: controller,
      style: TextStyle(color: Colors.white),
      decoration: InputDecoration(
        contentPadding: EdgeInsets.symmetric(horizontal: 10),
        labelText: labelText,
        labelStyle: TextStyle(color: Colors.white),
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(10.0),
        borderSide: const BorderSide(color: Colors.white, width: 0.0),
        
        ),
        
      ),
    ),
  );
}
