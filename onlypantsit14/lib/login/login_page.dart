// ignore_for_file: unnecessary_null_comparison

import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:onlypantsit14/theme/colors.dart';

class Login extends StatefulWidget {
  const Login({super.key});

  @override
  State<Login> createState() => _LoginState();
}

class _LoginState extends State<Login> {
  TextEditingController usernamecontroller = TextEditingController();
  TextEditingController passwordcontroller = TextEditingController();
  late String errormessage;
  late bool isError;

  @override
  void initState() {
    errormessage = "This is an error";
    isError = false;
    super.initState();
  }

  @override
  void dispose() {
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(backgroundColor: Colors.grey[200], actions: [
        IconButton(
          icon: Icon(
            Icons.admin_panel_settings_outlined,
            color: Colors.grey[700],
          ),
          onPressed: () {
            Navigator.pushNamed(context, '/adminlogin');
          },
        )
      ]),
      body: Container(
        color: Colors.grey[200], // Set background color to grey
        child: Center(
          child: Container(
            margin: const EdgeInsets.symmetric(horizontal: 25),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Image.asset(
                      'lib/images/op-logo-1.png',
                      height: 150,
                    ),
                  ],
                ),
                const SizedBox(height: 10), // Adjust spacing as needed
                Text(
                  'OnlyPants',
                  style: TextStyle(
                    color: primaryColor,
                    fontSize: 35,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 40),
                TextField(
                  controller: usernamecontroller,
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    labelText: 'Username/Email',
                    prefixIcon: Icon(Icons.person_3_outlined),
                  ),
                ),
                const SizedBox(height: 15),
                TextField(
                  obscureText: true,
                  controller: passwordcontroller,
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    labelText: 'Password',
                    prefixIcon: Icon(Icons.lock_outline),
                  ),
                ),
                const SizedBox(height: 25),
                ElevatedButton(
                  style: ElevatedButton.styleFrom(
                    minimumSize: const Size.fromHeight(50),
                    primary: primaryColor,
                  ),
                  onPressed: () {
                    checkLogin(
                        usernamecontroller.text, passwordcontroller.text);
                  },
                  child: const Text(
                    'LOGIN',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
                const SizedBox(height: 25),
                GestureDetector(
                  onTap: () {
                    // Navigate to the Register page
                    Navigator.pushNamed(context, '/register');
                  },
                  child: const Text(
                    "Don't have an account? Register",
                    style: TextStyle(
                      color: Colors.blue,
                      decoration: TextDecoration.underline,
                    ),
                  ),
                ),
                const SizedBox(height: 15),
                (isError)
                    ? Text(errormessage, style: errortxtstyle)
                    : Container(),
              ],
            ),
          ),
        ),
      ),
    );
  }

  var errortxtstyle = const TextStyle(
    fontWeight: FontWeight.bold,
    color: Colors.red,
    letterSpacing: 1,
    fontSize: 18,
  );

  Future checkLogin(username, password) async {
    try {
      final user = await FirebaseAuth.instance.signInWithEmailAndPassword(
        email: username,
        password: password,
      );

      if (user != null) {
        // Successful login, redirect to customerview page
        Navigator.pushReplacementNamed(context, '/customerview');
      }
    } on FirebaseAuthException catch (e) {
      setState(() {
        errormessage = e.message.toString();
        isError = true;
      });
    }
  }
}
