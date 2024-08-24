import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:finalproject_ml/users.dart';
import 'package:flutter/material.dart';
import 'package:finalproject_ml/home.dart';
import 'package:finalproject_ml/users.dart';

class Listofmluser extends StatefulWidget {
  const Listofmluser({
    super.key,
  });

  @override
  State<Listofmluser> createState() => _ListofmluserState();
}

class _ListofmluserState extends State<Listofmluser> {
  late TextEditingController namemlController;
  late TextEditingController roleController;
  late TextEditingController rankController;
  late TextEditingController imageUrlController;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    namemlController = TextEditingController();
    roleController = TextEditingController();
    rankController = TextEditingController();
    imageUrlController = TextEditingController();
  }

  void dispose() {
    namemlController.dispose();
    roleController.dispose();
    rankController.dispose();
    imageUrlController.dispose();
    super.dispose();
  }

  CollectionReference ref = FirebaseFirestore.instance.collection('User');
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: NavigationDrawer(),
      appBar: AppBar(
        title: const Text('ML User'),
        backgroundColor: Colors.black,
      ),
      body: StreamBuilder<List<Users>>(
        stream: readUsers(),
        builder: (context, snapshot) {
          if (snapshot.hasError) {
            return Text('Something went wrong! ${snapshot.error}');
          } else if (snapshot.hasData) {
            final users = snapshot.data!;

            return ListView(
              children: users.map(buildUser).toList(),
            );
          } else {
            return const Center(
              child: CircularProgressIndicator(),
            );
          }
        },
      ),
    );
  }

  Widget buildUser(Users user) => ListTile(
        leading: IconButton(
            onPressed: () {
              namemlController.text = user.nameml;
              roleController.text = user.role;
              rankController.text = user.rank;
              imageUrlController.text = user.imageUrl;
              showDialog(
                  context: context,
                  builder: (context) => Dialog(
                        child: Container(
                          color: Colors.black,
                          child: Padding(
                            padding: const EdgeInsets.all(8.0),
                            child: ListView(
                              shrinkWrap: true,
                              children: <Widget>[
                                buildTextField(
                                  namemlController,
                                  'Enter ml name',
                                ),
                                const SizedBox(height: 15),
                                buildTextField(roleController, 'Role'),
                                const SizedBox(height: 15),
                                buildTextField(rankController, 'ML rank'),
                                const SizedBox(height: 15),
                                buildTextField(
                                    imageUrlController, 'Main hero Image'),
                                ElevatedButton.icon(
                                  onPressed: () {
                                    final docUser = FirebaseFirestore.instance
                                        .collection('Users')
                                        .doc(user.id);
                                    docUser.update({
                                      'nameml': namemlController.text,
                                      'role': roleController.text,
                                      'rank': rankController.text,
                                      'imageUrl': imageUrlController.text,
                                    }).whenComplete(
                                        () => Navigator.pop(context));
                                  },
                                  icon: Icon(Icons.edit_attributes_sharp),
                                  label: Text('Update'),
                                ),
                                const SizedBox(height: 15),
                                ElevatedButton.icon(
                                  onPressed: () {
                                    deleteUser(user.id);
                                  },
                                  icon: Icon(Icons.delete_forever_rounded),
                                  label: Text('Delete'),
                                ),
                              ],
                            ),
                          ),
                        ),
                      ));
            },
            icon: Icon(Icons.edit)),
        title: Text(
          user.nameml,
        ),
        subtitle: Column(
          children: <Widget>[
            Text(
              user.role,
              style: TextStyle(color: Colors.grey),
            ),
            Text(
              user.rank,
              style: TextStyle(color: Colors.green),
            ),
          ],
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.start,
        ),
         trailing: Image.network(
          user.imageUrl,
          height: 100,
          width: 100,
          fit: BoxFit.cover,
        ),
      );

  Stream<List<Users>> readUsers() =>
      FirebaseFirestore.instance.collection('Users').snapshots().map(
            (snapshot) => snapshot.docs
                .map(
                  (doc) => Users.fromJson(
                    doc.data(),
                  ),
                )
                .toList(),
          );
  deleteUser(String id) {
    final docUser = FirebaseFirestore.instance.collection('Users').doc(id);
    docUser.delete();
    Navigator.pop(context);
  }

  updateUser(String id) {
    final docUser = FirebaseFirestore.instance.collection('Users').doc(id);
    docUser.update({
      'nameml': namemlController.text,
      'role': roleController.text,
      'rank': rankController.text,
      'imageUrl': imageUrlController.text,
    });

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
