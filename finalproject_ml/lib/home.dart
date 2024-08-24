import 'package:finalproject_ml/addpage.dart';
import 'package:finalproject_ml/favpage.dart';
import 'package:finalproject_ml/listofml.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:finalproject_ml/Item.dart';
import 'package:finalproject_ml/drawerheader.dart';
import 'package:finalproject_ml/emblem.dart';
import 'package:finalproject_ml/heros.dart';
import 'package:finalproject_ml/meta.dart';
import 'package:finalproject_ml/mluser.dart';

import 'categoryscroll.dart';
import 'herodata.dart';
import 'herodetials.dart';

class Homepage extends StatefulWidget {
  const Homepage({super.key});

  @override
  State<Homepage> createState() => _HomepageState();
}

class _HomepageState extends State<Homepage> {
  final CategoriesScroller categoriesScroller = CategoriesScroller();
  List<Widget> itemsData = [];
  bool closeTopContainer = false;
  ScrollController controller = ScrollController();
  double topContainer = 0;
  @override
  void getPostsData() {
    List<dynamic> responseList = HERO_DATA;
    List<Widget> listItems = [];
    responseList.forEach((post) {
      listItems.add(
        Container(
          height: 150,
          margin: const EdgeInsets.symmetric(horizontal: 20, vertical: 10),
          decoration: BoxDecoration(
              borderRadius: BorderRadius.all(Radius.circular(20.0)),
              color: Colors.white,
              boxShadow: [
                BoxShadow(color: Colors.black.withAlpha(100), blurRadius: 10.0),
              ]),
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 20.0, vertical: 10),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: <Widget>[
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      post["name"],
                      style: const TextStyle(
                          fontSize: 22, fontWeight: FontWeight.bold, color:  Colors.blue),
                    ),
                    Text(
                      post["sub"],
                      style: const TextStyle(fontSize: 10, color: Colors.grey),
                    ),
                    SizedBox(
                      height: 10,
                    ),
                    Text(
                      "${post["hero"]}",
                      style: const TextStyle(
                          fontSize: 20,
                          color: Colors.black,
                          fontWeight: FontWeight.bold),
                    )
                  ],
                ),
                
                  Expanded(
                    child: Image.asset(
                      "assets/images/${post["image"]}",
                      height: 100,  width: 100, fit:  BoxFit.cover,
                    ),
                  ),
                
              ],
            ),
          ),
        ),
      );
    });
    setState(() {
      itemsData = listItems;
    });
  }

  void initState() {
    // TODO: implement initState
    super.initState();
    getPostsData();
    controller.addListener(() {
      double value = controller.offset / 119;

      setState(() {
        topContainer = value;
        closeTopContainer = controller.offset > 50;
      });
    });
  }

  @override
  void dispose() {
    // TODO: implement dispose
    super.dispose();
  }

  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    final double categoryHeight = size.height * 0.30;
    return Scaffold(
      floatingActionButton: FloatingActionButton.extended(
        onPressed: () {
          Navigator.push(
            context,
            MaterialPageRoute(
              builder: (context) => AddPage(),
            ),
          );
        },
        label: const Text('Add'),
        icon: const Icon(Icons.add_a_photo_outlined),
        backgroundColor: Colors.black,
      ),
      appBar: AppBar(
        title: Text('ML Homepage'),
        backgroundColor: Colors.black,
      ),
      drawer: const NavigationDrawer(),
      body: Container(
        color: Colors.black,
        height: size.height,
        child: Column(
          children: <Widget>[
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: <Widget>[],
            ),
            const SizedBox(height: 10),
            AnimatedOpacity(
              duration: const Duration(milliseconds: 200),
              opacity: closeTopContainer ? 0 : 1,
              child: AnimatedContainer(
                  duration: const Duration(milliseconds: 200),
                  width: size.width,
                  alignment: Alignment.topCenter,
                  height: closeTopContainer ? 0 : categoryHeight,
                  child: categoriesScroller),
            ),
            Expanded(
              child: ListView.builder(
                controller: controller,
                itemCount: itemsData.length,
                physics: BouncingScrollPhysics(),
                itemBuilder: (context, index) {
                  double scale = 1.0;
                  if (topContainer > 0.5) {
                    scale = index + 0.5 - topContainer;
                    if (scale < 0) {
                      scale = 0;
                    } else if (scale > 1) {
                      scale = 1;
                    }
                  }
                  return Opacity(
                    opacity: scale,
                    child: Transform(
                      transform: Matrix4.identity()..scale(scale, scale),
                      alignment: Alignment.bottomCenter,
                      child: Align(
                          heightFactor: 0.7,
                          alignment: Alignment.topCenter,
                          child: itemsData[index]),
                    ),
                  );
                },
              ),
            ),
          ],
        ),
      ),
    );
  }
}

class NavigationDrawer extends StatelessWidget {
  const NavigationDrawer({super.key});

  @override
  Widget build(BuildContext context) => Drawer(
        child: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: <Widget>[buildHeader(context), buildMenuItems(context)],
          ),
        ),
      );
  Widget buildHeader(BuildContext context) => Material(
        child: Container(
          color: Colors.black,
          padding: EdgeInsets.only(
            top: 15 + MediaQuery.of(context).padding.top,
            bottom: 24,
          ),
          child: Column(
            children: const [
              CircleAvatar(
                radius: 30,
                backgroundImage: NetworkImage(
                    'https://vcgamers.com/news/wp-content/uploads/2022/05/moba1.png'),
              ),
              SizedBox(
                height: 12,
              ),
              Text(
                'ML WIKI',
                style: TextStyle(color: Colors.grey, fontSize: 28),
              ),
              Text(
                'By @flutter',
                style: TextStyle(color: Colors.grey, fontSize: 16),
              ),
            ],
          ),
        ),
      );

  Widget buildMenuItems(BuildContext context) => Container(
        padding: const EdgeInsets.all(24),
        child: Wrap(
          runSpacing: 16,
          children: [
            ListTile(
              leading: const Icon(Icons.home_outlined),
              title: const Text('HOME'),
              onTap: () {
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const Homepage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.people),
              title: const Text('HEROS'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const Herospage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.account_balance_wallet),
              title: const Text('ITEM'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const ItemsPage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.add_moderator),
              title: const Text('EMBLEM'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const Emblempage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.admin_panel_settings_rounded),
              title: const Text('META MAP'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const Metapage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.star_border_sharp),
              title: const Text('ML Users'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => const Listofmluser(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.star_border_sharp),
              title: const Text('Favorite Hero'),
              onTap: () {
                Navigator.pop(context);
                Navigator.of(context).pushReplacement(
                  MaterialPageRoute(
                    builder: (context) => FavPage(),
                  ),
                );
              },
            ),
            const Divider(color: Colors.black),
            ListTile(
              leading: const Icon(Icons.backspace_outlined),
              title: const Text('Sign out'),
              onTap: () {
                FirebaseAuth.instance.signOut();
              },
            ),
          ],
        ),
      );
}
