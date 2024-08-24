import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:finalproject_ml/addpage.dart';
import 'package:finalproject_ml/home.dart';
import 'package:finalproject_ml/user1.dart';
import 'package:finalproject_ml/userpost1.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'fav2.dart';

class FavPage extends StatefulWidget {
  const FavPage({super.key});

  @override
  State<FavPage> createState() => _FavPageState();
}

class _FavPageState extends State<FavPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.black,
        leading: IconButton(
            icon: Icon(Icons.arrow_back, color: Colors.white),
            onPressed: () {
              Navigator.of(context).push(
                MaterialPageRoute(
                  builder: (context) => Homepage(),
                ),
              );
            }),
        title: Text("Favorite Hero"),
        centerTitle: true,
        actions: [
          IconButton(
            color: Colors.green,
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Fav2page()),
                );
              },
              icon: Icon(Icons.star_border_outlined))
        ],
      ),
      body: StreamBuilder<List<Users1>>(
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

  Widget imgExist(img) => ConstrainedBox(
        constraints: BoxConstraints(
          minWidth: 60,
          minHeight: 60,
          maxWidth: 70,
          maxHeight: 70,
        ),
        child: Image.network(
          img,
          width: 500,
          height: 500,
        ),
      );
  Widget imgNotExist() => const Icon(
        Icons.account_circle_rounded,
        size: 40,
      );

  Widget buildUser(Users1 user) => Container(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: ListTile(
            leading: (user.image != "-") ? imgExist(user.image) : imgNotExist(),
            title: Text(
              user.namehero,
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            subtitle: Text(user.winrate),
            trailing: Row(
              mainAxisSize: MainAxisSize.min,
              children: [
                TextButton.icon(
                  style: TextButton.styleFrom(
                    primary: (!user.isLiked) ? Colors.grey : Colors.green,
                  ),
                  onPressed: () {
                    setState(() {
                      if (!user.isLiked) {
                        user.isLiked = true;
                        updateLike(user.id, true);
                      } else {
                        user.isLiked = false;
                        updateLike(user.id, false);
                      }
                    });
                  },
                  icon: const Icon(
                    Icons.star_border_outlined,
                    size: 20,
                  ),
                  label: const Text('Star'),
                ),
              ],
            ),
            onTap: () {
              showDialog(
                  context: context,
                  builder: (context) => Dialog(
                        child: Container(
                          color: Colors.black,
                          child: Padding(
                            padding: const EdgeInsets.all(10.0),
                            child: ListView(
                              shrinkWrap: true,
                              children: <Widget>[
                                Column(
                                  children: [
                                    Column(
                                      mainAxisAlignment:
                                          MainAxisAlignment.start,
                                      children: <Widget>[
                                        Container(
                                          child: Image.network(user.image,
                                              height: 300, fit: BoxFit.cover),
                                        )
                                      ],
                                    ),
                                    SizedBox(
                                      height: 30,
                                    ),
                                    Text(
                                      'Hero Name:',
                                      style: TextStyle(
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15,
                                          color: Colors.white),
                                    ),
                                    Text(
                                      user.namehero,
                                      style: TextStyle(color: Colors.red),
                                    ),
                                    const Divider(color: Colors.white),
                                    Text(
                                      'Hero Winrate:',
                                      style: TextStyle(
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15,
                                          color: Colors.white),
                                    ),
                                    Text(
                                      user.winrate,
                                      style: TextStyle(color: Colors.red),
                                    ),
                                    const Divider(color: Colors.white),
                                    Text(
                                      'Hero Matches:',
                                      style: TextStyle(
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15,
                                          color: Colors.white),
                                    ),
                                    Text(
                                      user.matches,
                                      style: TextStyle(color: Colors.red),
                                    ),
                                    const Divider(color: Colors.white),
                                    TextButton.icon(
                                      style: TextButton.styleFrom(
                                        primary: (!user.isLiked)
                                            ? Colors.grey
                                            : Colors.green,
                                      ),
                                      onPressed: () {},
                                      icon: const Icon(
                                        Icons.star_border_outlined,
                                        size: 20,
                                      ),
                                      label: const Text('Star'),
                                    ),
                                  ],
                                ),
                              ],
                            ),
                          ),
                        ),
                      ));
            },
          ),
        ),
      );

  Stream<List<Users1>> readUsers() =>
      FirebaseFirestore.instance.collection('Users1').snapshots().map(
            (snapshot) => snapshot.docs
                .map(
                  (doc) => Users1.fromJson(
                    doc.data(),
                  ),
                )
                .toList(),
          );

  deleteUser(String id) {
    final docUser = FirebaseFirestore.instance.collection('Users1').doc(id);
    docUser.delete();
    Navigator.pop(context);
  }

  updateLike(String id, bool status) {
    final docUser = FirebaseFirestore.instance.collection('Users1').doc(id);
    docUser.update({
      'isLiked': status,
    });
  }
}
