import 'package:flutter/material.dart';

class Drawerpage extends StatefulWidget {
  const Drawerpage({super.key});

  @override
  State<Drawerpage> createState() => _DrawerpageState();
}

class _DrawerpageState extends State<Drawerpage> {
  @override
  Widget build(BuildContext context) {
    return Container(
      color: Colors.black,
      width: double.infinity,
      height: 200,
      padding: EdgeInsets.only(top: 20.0),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Container(
            margin: EdgeInsets.only(bottom: 10),
            height: 70,
            decoration: const BoxDecoration(
              shape: BoxShape.circle,
              image: DecorationImage(
                image: AssetImage(
                  'assets/images/ml_logo2.png',
                ),
              ),
            ),
          ),
          const Text(
            'ML WIKi',
            style: TextStyle(color: Colors.white, fontSize: 20),
          ),
          const Text(
            'Mbbile legends bang bang',
            style: TextStyle(color: Colors.grey, fontSize: 14),
          )
        ],
      ),
    );
  }
}
