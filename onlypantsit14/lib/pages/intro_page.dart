import 'package:flutter/material.dart';
import 'package:onlypantsit14/components/button.dart';

import 'package:onlypantsit14/theme/colors.dart';

class Intropage extends StatelessWidget {
  const Intropage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: primaryColor,
      body: Padding(
        padding: const EdgeInsets.all(25.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: [
            const SizedBox(
              height: 25,
            ),

            // Shop name
            const Text(
              "Only Pants",
              style: TextStyle(
                color: Colors.white,
                fontSize: 28,
                fontFamily: 'DM Serif Display',
              ),
            ),
            const SizedBox(
              height: 20,
            ),

            // Icon
            Padding(
              padding: const EdgeInsets.fromLTRB(150, 25, 150, 50),
              child: Image.asset('lib/images/pants1.png'),
            ),
            const SizedBox(
              height: 25,
            ),
            // Title
            const Text(
              "Meta jeans in the city",
              style: TextStyle(
                  color: Colors.white,
                  fontSize: 25,
                  fontFamily: 'DM Serif Display'),
            ),
            const Text(
              "Feel the taste of the next popular Jeans Shop from anytime anywhere",
              style: TextStyle(
                color: Colors.grey,
                height: 2,
              ),
            ),
            const SizedBox(
              height: 20,
            ),

            // Get started button
            MyButton(
              text: "Get Started",
              onTap: () {
                //go to menu page
                Navigator.pushNamed(context, '/menupage');
              },
            )
          ],
        ),
      ),
    );
  }
}
