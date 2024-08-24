import 'package:flutter/material.dart';


import 'main.dart';

class Page11 extends StatefulWidget {
  const Page11({super.key});

  @override
  State<Page11> createState() => _Page11State();
}



class _Page11State extends State<Page11> {
  late int num;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    num = 0;
  }

  @override
  void dispose() {
    // TODO: implement dispose
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("My First Stateful Page1"),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text("The value of num is: $num"),
            ElevatedButton.icon(
              icon: const Icon(
                Icons.navigate_next,
                color: Colors.white,
              ),
              onPressed: () {
                setState(() {
                  num++;
                },
                );
              },
              label: const Text("click"),
            ),
          ],
        ),
      ),
    );
  }
}
