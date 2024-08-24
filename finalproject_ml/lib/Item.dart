import 'package:flutter/material.dart';

import 'home.dart';

class ItemsPage extends StatefulWidget {
  const ItemsPage({super.key});

  @override
  State<ItemsPage> createState() => _ItemsPageState();
}

class _ItemsPageState extends State<ItemsPage> {
  final List<bool> _states = [];
  @override
  void initState() {
    super.initState();
    _states.addAll([false, false, false, false, false]);
  }

  Widget build(BuildContext context) {
    return Scaffold(
        drawer: NavigationDrawer(),
        appBar: AppBar(
          title: const Text('Items'),
          backgroundColor: Colors.black,
        ),
        body: ListView(
          children: <Widget>[
            ExpansionPanelList(
              expansionCallback: (int index, bool value) {
                setState(() {
                  for (int i = 0; i < _states.length; i++) {
                    if (i != index) {
                      _states[i] = false;
                    }
                  }
                  _states[index] = !_states[index];
                });
              },
              children: [
                ExpansionPanel(
                  backgroundColor: Colors.black87,
                  isExpanded: _states[0],
                  headerBuilder: (BuildContext context, bool isExpanded) =>
                      ListTile(
                          leading: ConstrainedBox(
                            constraints: const BoxConstraints(
                              minWidth: 44,
                              minHeight: 44,
                              maxWidth: 64,
                              maxHeight: 64,
                            ),
                            child: Image.asset('assets/images/halberd.jpg'),
                          ),
                          title: const Text(
                            'SEA HALBERD',
                            style: TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.white),
                          )),
                  body: const ListTile(
                    leading: SizedBox(),
                    title: Center(
                        child: Text(
                      '	+70 Physical ATK +25% Attack Speed Life Drain: Upon dealing damage to the target, reduces Shield and HP Regen of the target by 50% for 3s.',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                          fontWeight: FontWeight.bold, color: Colors.white),
                    )),
                  ),
                ),
                ExpansionPanel(
                  backgroundColor: Colors.black87,
                  isExpanded: _states[1],
                  headerBuilder: (BuildContext context, bool isExpanded) =>
                      ListTile(
                          leading: ConstrainedBox(
                            constraints: const BoxConstraints(
                              minWidth: 44,
                              minHeight: 44,
                              maxWidth: 64,
                              maxHeight: 64,
                            ),
                            child: Image.asset('assets/images/Windtalker.jpg'),
                          ),
                          title: const Text(
                            'WINDTALKER',
                            style: TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.white),
                          )),
                  body: const ListTile(
                    leading: SizedBox(),
                    title: Center(
                        child: Text(
                      '+40% Attack Speed 	+10% Crit Chance Unique Passive	Typhoon: Every 5-3s, ',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                          fontWeight: FontWeight.bold, color: Colors.white),
                    )),
                  ),
                ),
                ExpansionPanel(
                  backgroundColor: Colors.black87,
                  isExpanded: _states[2],
                  headerBuilder: (BuildContext context, bool isExpanded) =>
                      ListTile(
                          leading: ConstrainedBox(
                            constraints: const BoxConstraints(
                              minWidth: 44,
                              minHeight: 44,
                              maxWidth: 64,
                              maxHeight: 64,
                            ),
                            child:
                                Image.asset('assets/images/hunterstrike.jpg'),
                          ),
                          title: const Text(
                            'HUNTERS STRIKE',
                            style: TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.white),
                          )),
                  body: const ListTile(
                    leading: SizedBox(),
                    title: Center(
                        child: Text(
                      '+80 Physical ATK +10% CD Reduction +15 Physical PEN Unique Passive	Retribution: Deals damage to an enemy ',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                          fontWeight: FontWeight.bold, color: Colors.white),
                    )),
                  ),
                ),
                ExpansionPanel(
                  backgroundColor: Colors.black87,
                  isExpanded: _states[3],
                  headerBuilder: (BuildContext context, bool isExpanded) =>
                      ListTile(
                          leading: ConstrainedBox(
                            constraints: const BoxConstraints(
                              minWidth: 44,
                              minHeight: 44,
                              maxWidth: 64,
                              maxHeight: 64,
                            ),
                            child:
                                Image.asset('assets/images/Endless_Battle.jpg'),
                          ),
                          title: const Text(
                            'ENDLESS BATTLE',
                            style: TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.white),
                          )),
                  body: const ListTile(
                    leading: SizedBox(),
                    title: Center(
                        child: Text(
                      '+250 HP 	+65 Physical ATK +10% Physical Lifesteal 	+5 Mana Regen 	+10% CD Reduction ',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                          fontWeight: FontWeight.bold, color: Colors.white),
                    )),
                  ),
                ),
                ExpansionPanel(
                  backgroundColor: Colors.black87,
                  isExpanded: _states[4],
                  headerBuilder: (BuildContext context, bool isExpanded) =>
                      ListTile(
                          leading: ConstrainedBox(
                            constraints: const BoxConstraints(
                              minWidth: 44,
                              minHeight: 44,
                              maxWidth: 64,
                              maxHeight: 64,
                            ),
                            child: Image.asset('assets/images/Rosegold.jpg'),
                          ),
                          title: const Text(
                            'ROSE GOLD',
                            style: TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.white),
                          )),
                  body: const ListTile(
                    leading: SizedBox(),
                    title: Center(
                        child: Text(
                      '+250 HP +65 Physical ATK +10% Physical Lifesteal +5 Mana Regen +10% CD Reduction +5% Movement SPD Unique Passive	Divine Justice',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                          fontWeight: FontWeight.bold, color: Colors.white),
                    )),
                  ),
                ),
               
              ],
            ),
          ],
        ));
  }
}
