import 'dart:io';
import 'dart:math';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:file_picker/file_picker.dart';
import 'package:finalproject_ml/user1.dart';
import 'package:firebase_storage/firebase_storage.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class AddPage extends StatefulWidget {
  const AddPage({super.key});

  @override
  State<AddPage> createState() => _AddPageState();
}

class _AddPageState extends State<AddPage> {
  late TextEditingController nameherocontroller;
  late TextEditingController roleherocontroller;
  late TextEditingController winratecontroller;
  late TextEditingController matchescontroller;
  PlatformFile? pickedFile;
  UploadTask? uploadTask;

  Future selectFile() async {
    final result = await FilePicker.platform.pickFiles();
    if (result == null) return;

    setState(() {
      pickedFile = result.files.first;
    });
  }

  String generateRandomString(int len) {
    var r = Random();
    const _chars = '';
    return List.generate(len, (index) => _chars[r.nextInt(_chars.length)])
        .join();
  }

  Future uploadFile() async {
    final path = 'test/${pickedFile!.name}';
    final file = File(pickedFile!.path!);

    final ref = FirebaseStorage.instance.ref().child(path);

    setState(() {
      uploadTask = ref.putFile(file);
    });

    final snapshot = await uploadTask!.whenComplete(() {});
    final urlDownload = await snapshot.ref.getDownloadURL();
    print('Download Link: $urlDownload');

    createUser(urlDownload);

    setState(() {
      uploadTask = null;
    });
  }

  @override
  void initState() {
    super.initState();
    nameherocontroller = TextEditingController();
    roleherocontroller = TextEditingController();
    winratecontroller = TextEditingController();
    matchescontroller = TextEditingController();
  }

  @override
  void dispose() {
    nameherocontroller.dispose();
    roleherocontroller.dispose();
    winratecontroller.dispose();
    matchescontroller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.black,
      appBar: AppBar(
        backgroundColor: Colors.black,
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.white),
          onPressed: () => Navigator.of(context).pop(),
        ),
        title: Text("Add Favorite"),
        centerTitle: true,
      ),
      body: ListView(
        children: [
          Center(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const SizedBox(
                  height: 20,
                ),
                Container(
                  margin: const EdgeInsets.all(10),
                  decoration: BoxDecoration(
                    border: Border.all(
                      width: 2,
                      color: Color.fromARGB(142, 158, 158, 158),
                    ),
                  ),
                  child: Center(
                    child: (pickedFile == null) ? imgNotExist() : imgExist(),
                  ),
                ),
                ElevatedButton.icon(
                  onPressed: () {
                    selectFile();
                  },
                  icon: const Icon(Icons.camera),
                  label: const Text('Add Photo'),
                ),
                Container(
                  padding: const EdgeInsets.symmetric(
                    horizontal: 20,
                    vertical: 10,
                  ),
                  child: TextField(
                    controller: nameherocontroller,
                    decoration: InputDecoration(
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10.0),
                        ),
                        filled: true,
                        hintStyle: TextStyle(color: Colors.grey[800]),
                        hintText: "Enter Hero Name",
                        fillColor: Colors.white70),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.symmetric(
                    horizontal: 20,
                    vertical: 10,
                  ),
                  child: TextField(
                    controller: roleherocontroller,
                    decoration: InputDecoration(
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10.0),
                        ),
                        filled: true,
                        hintStyle: TextStyle(color: Colors.grey[800]),
                        hintText: "Enter Role",
                        fillColor: Colors.white70),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.symmetric(
                    horizontal: 20,
                    vertical: 10,
                  ),
                  child: TextField(
                    controller: winratecontroller,
                    decoration: InputDecoration(
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10.0),
                        ),
                        filled: true,
                        hintStyle: TextStyle(color: Colors.grey[800]),
                        hintText: "Enter Hero Winrate",
                        fillColor: Colors.white70),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.symmetric(
                    horizontal: 20,
                    vertical: 10,
                  ),
                  child: TextField(
                    controller: matchescontroller,
                    decoration: InputDecoration(
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10.0),
                        ),
                        filled: true,
                        hintStyle: TextStyle(color: Colors.grey[800]),
                        hintText: "Enter Hero Matches",
                        fillColor: Colors.white70),
                  ),
                ),
                SizedBox(
                  height: 100, //height of button
                  width: 200, //width of button
                  child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                        primary: Colors.green, //background color of button
                        side: const BorderSide(
                            width: 3,
                            color: Colors.transparent), //border width and color
                        elevation: 3, //elevation of button
                        shape: RoundedRectangleBorder(
                            //to set border radius to button
                            borderRadius: BorderRadius.circular(30)),
                        padding: const EdgeInsets.all(
                            20) //content padding inside button
                        ),
                    onPressed: () {
                      uploadFile();
                    },
                    child: const Text(
                      "Create Favorite",
                      style: TextStyle(fontWeight: FontWeight.bold),
                    ),
                  ),
                ),
                const SizedBox(
                  height: 10,
                ),
                buildProgress(),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget imgExist() => Image.file(
        File(pickedFile!.path!),
        width: double.infinity,
        height: 250,
        fit: BoxFit.cover,
      );

  Widget imgNotExist() => Image.asset(
        'assets/images/no-ml.jpg',
        fit: BoxFit.cover,
      );
  Future createUser(urlDownload) async {
    final docUser = FirebaseFirestore.instance.collection('Users1').doc();

    final newUser = Users1(
      id: docUser.id,
      namehero: nameherocontroller.text,
      rolehero: roleherocontroller.text,
      winrate: winratecontroller.text,
      matches: matchescontroller.text,
      image: urlDownload,
      isLiked: false,
    );

    final json = newUser.toJson();
    await docUser.set(json);

    setState(() {
      nameherocontroller.text = "";
      roleherocontroller.text = "";
      winratecontroller.text = "";
      matchescontroller.text = "";
      pickedFile = null;
    });
  }

  Widget buildProgress() => StreamBuilder<TaskSnapshot>(
      stream: uploadTask?.snapshotEvents,
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          final data = snapshot.data!;
          double progress = data.bytesTransferred / data.totalBytes;

          return SizedBox(
            height: 50,
            child: Stack(
              fit: StackFit.expand,
              children: [
                LinearProgressIndicator(
                  value: progress,
                  backgroundColor: Colors.grey,
                  color: Colors.green,
                ),
                Center(
                  child: Text(
                    '${(100 * progress).roundToDouble()}%',
                    style: const TextStyle(
                      color: Colors.white,
                    ),
                  ),
                )
              ],
            ),
          );
        } else {
          return const SizedBox(
            height: 50,
          );
        }
      });
}
