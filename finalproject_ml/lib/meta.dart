import 'package:flutter/material.dart';
import 'package:finalproject_ml/metadetails.dart';


import 'home.dart';

class Metapage extends StatefulWidget {
 
  const Metapage({super.key,});

  @override
  State<Metapage> createState() => _MetapageState();
}

class _MetapageState extends State<Metapage> {
    double screenWidth = 0;
  double screenHeight = 0;
  
  
  @override
  Widget build(BuildContext context) {
     screenHeight = MediaQuery.of(context).size.height;
    screenWidth = MediaQuery.of(context).size.width;

    return Scaffold(
      drawer: NavigationDrawer(),
      appBar: AppBar(
        title: const Text('Meta map'),
        backgroundColor: Colors.black,
      ),
      body: Container(
         color: Colors.grey,
        child: Padding(
          padding: EdgeInsets.symmetric(
            horizontal: screenWidth / 20,
          ),
          child: Column(
            children: [
              const Text(
                "META MAPS!",
                style: TextStyle(
                  fontWeight: FontWeight.w900,
                  color: Colors.black87,
                  fontSize: 30,
                ),
              ),
              Container(
                color: Colors.black26,
                width: screenWidth,
                height: 1,
                margin: const EdgeInsets.symmetric(
                  vertical: 20,
                ),
              ),
              item("map3.jpg", "Imperial Sanctuary", "There are 3 lanes on the map: Top lane, Middle Lane (aka Midlane), and Bottom lane (aka Bot lane).", "Top lane and Bot Lane is usually got switched, and sometimes both Gold lane and EXP lane whether in Top Lane or Bot Lane. There are signs at the corners of the map to indicate which role for which lane"),
              item("map2.jpg", "The Western Expanse ", "The point of the jungles is to have a method of gaining gold or experience for your hero faster.", "There are certain heroes that are encouraged to the jungle, while some others are not. Check first your heroes' specialty in the jungle before locking in jungling items, emblems and spells."),
              item("map1.jpg", "Celestial Palace", "There are numerous small monsters or creeps, scattered throughout the jungle", "There are numerous small monsters or creeps, scattered throughout the jungle give out any buffs and are naturally, good for gold and experience only. These monsters spawn at various times and you can clear these camps often, to obtain more gold and experience"),
            ],
          ),
        ),
      ),
    );
  }

   Widget item(String asset, String title, String desc, String fullDesc) {
    return GestureDetector(
      onTap: () {
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => Metadet(
              asset: asset,
              tag: title,
              fullDesc: fullDesc,
            ),
          ),
        );
      },
      child: Container(
        height: screenWidth / 2.8,
        width: screenWidth,
        margin: EdgeInsets.only(
          bottom: screenWidth / 20,
        ),
        child: Row(
          children: [
            Hero(
              tag: title,
              child: Container(
                width: screenWidth / 2.8,
                height: screenWidth / 2.8,
                margin: EdgeInsets.only(
                  right: screenWidth / 20,
                ),
                child: ClipRRect(
                  borderRadius: BorderRadius.circular(10),
                  child: Image.asset(
                    "assets/images/$asset",
                    fit: BoxFit.cover,
                  ),
                ),
              ),
            ),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                children: [
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        title,
                        style: const TextStyle(
                          fontWeight: FontWeight.w900,
                          color: Colors.black87,
                          fontSize: 20,
                        ),
                      ),
                      Text(
                        desc,
                        style: const TextStyle(
                          fontWeight: FontWeight.w300,
                          color: Colors.black87,
                          fontSize: 14,
                        ),
                      ),
                    ],
                  ),
                  const Text(
                    "ROTATIONAL MAPS",
                    style: TextStyle(
                      fontWeight: FontWeight.w600,
                      color: Colors.black,
                      fontSize: 20,
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
  
}