import 'package:finalproject_ml/mluser.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:finalproject_ml/home.dart';
import 'package:finalproject_ml/palette.dart';

import '../widgets/widgets.dart';

class LoginPage extends StatefulWidget {
  LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  late TextEditingController usernamecontroller;
  late TextEditingController passwordcontroller;
  late String error;

  void initState() {
    super.initState();
    usernamecontroller = TextEditingController();
    passwordcontroller = TextEditingController();
    error = "";
  }

  @override
  void dispose() {
    usernamecontroller.dispose();
    passwordcontroller.dispose();
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
              height: 150,
              child: const Center(
                child: Text('ML WIKI', style: Kheading),
              ),
            ),
            const SizedBox(
              height: 100,
            ),
            Container(
              padding: const EdgeInsets.symmetric(
                horizontal: 20,
                vertical: 10,
              ),
              child: TextField(
                style: const TextStyle(
                  color: Colors.white,
                ),
                controller: usernamecontroller,
                decoration: const InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.white, width: 0.0),
                  ),
                  icon: Icon(Icons.people),
                  border: OutlineInputBorder(),
                  labelText: 'Enter Email',
                ),
              ),
            ),
            Container(
              padding: const EdgeInsets.symmetric(
                horizontal: 20,
                vertical: 10,
              ),
              child: TextField(
                style: const TextStyle(
                  color: Colors.white,
                ),
                controller: passwordcontroller,
                obscureText: true,
                decoration: const InputDecoration(
                  enabledBorder: OutlineInputBorder(
                    borderSide: BorderSide(color: Colors.white, width: 0.0),
                  ),
                  icon: Icon(Icons.lock),
                  suffixIcon: Icon(Icons.remove_red_eye),
                  border: OutlineInputBorder(),
                  labelText: 'Enter password',
                ),
              ),
            ),
            Container(
              padding: const EdgeInsets.all(20),
              child: ElevatedButton.icon(
                icon: const Icon(
                  Icons.start_sharp,
                ),
                onPressed: () {
                  signIn();
                },
                style: ElevatedButton.styleFrom(
                  minimumSize: const Size.fromHeight(50),
                ),
                label: const Text(
                  'LOGIN',
                  style: TextStyle(
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Don't have an account?",
                  style: TextStyle(
                    color: Colors.white,
                  ),
                ),
                TextButton(
                  onPressed: () {
                    Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => Mluserpage(),
                        ));
                  },
                  child: const Text("Register here"),
                ),
              ],
            ),
            Align(
              alignment: Alignment.center,
              child: Container(
                padding: const EdgeInsets.all(20),
                child: Text(
                  error,
                  style: const TextStyle(color: Colors.red),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }

  Future signIn() async {
    showDialog(
      context: context,
      useRootNavigator: false,
      barrierDismissible: false,
      builder: (context) => const Center(
        child: CircularProgressIndicator(),
      ),
    );

    try {
      await FirebaseAuth.instance.signInWithEmailAndPassword(
        email: usernamecontroller.text.trim(),
        password: passwordcontroller.text.trim(),
      );
    } on FirebaseAuthException catch (e) {
      print(e);
      setState(() {
        error = e.message.toString();
      });
    }
    Navigator.pop(context);
  }
}
