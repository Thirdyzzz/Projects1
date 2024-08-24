import 'package:flutter/material.dart';

import 'home.dart';

class Emblempage extends StatefulWidget {
  const Emblempage({super.key});

  @override
  State<Emblempage> createState() => _EmblempageState();
}

class _EmblempageState extends State<Emblempage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: NavigationDrawer(),
      appBar: AppBar(
        title: const Text('Items'),
        backgroundColor: Colors.black,
      ),
      body: Container(
        child: ListView(
          children: <Widget>[
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem1.jpg'),
                  ),
                  title: const Text(
                    'PHYSICAL EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem2.jpg'),
                  ),
                  title: const Text(
                    'ASSASSIN EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem3.jpg'),
                  ),
                  title: const Text(
                    'SUPPORT EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem4.jpg'),
                  ),
                  title: const Text(
                    'TANK EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem5.jpg'),
                  ),
                  title: const Text(
                    'MAGE EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem6.jpg'),
                  ),
                  title: const Text(
                    'FIGHTER EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem7.jpg'),
                  ),
                  title: const Text(
                    'MARKSMAN EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem8.jpg'),
                  ),
                  title: const Text(
                    'JUNGLE EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
            SizedBox(
              width: double.infinity,
              height: 80,
              child: Card(
                color: Colors.black,
                child: ListTile(
                  leading: ConstrainedBox(
                    constraints: const BoxConstraints(
                      minWidth: 44,
                      minHeight: 44,
                      maxWidth: 64,
                      maxHeight: 64,
                    ),
                    child: Image.asset('assets/images/emblem9.jpg'),
                  ),
                  title: const Text(
                    'MAGICAL EMBLEM',
                    style: TextStyle(
                        color: Colors.white,
                        fontSize: 15,
                        fontWeight: FontWeight.bold),
                  ),
                  trailing: Icon(Icons.more_vert),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
