import 'package:flutter/material.dart';

import 'mluser.dart';
import 'herodetials.dart';
import 'home.dart';

class Hero {
  final String heroname;
  final String  role;
  final String urlAvatar;

  const Hero({
    required this.heroname,
    required this.role,
    required this.urlAvatar
  });
}

class Herospage extends StatefulWidget {
  
  const Herospage({super.key});

  @override
  State<Herospage> createState() => _HerospageState();
}

class _HerospageState extends State<Herospage> {
List<Hero> heros = [
  const Hero(
     heroname: 'Miya',
     role:'MarksMan',
     urlAvatar:'https://vcgamers.com/news/wp-content/uploads/2022/05/moba1.png', 
  ),
  const Hero(
     heroname: 'Amon',
     role:'Mage',
     urlAvatar:'https://gamingonphone.com/wp-content/uploads/2020/08/ghhg.jpg', 
  ),
  const Hero(
     heroname: 'M',
     role:'MarksMan',
     urlAvatar:'https://static.wikia.nocookie.net/mobile-legends/images/0/0f/Chou.png/revision/latest/scale-to-width-down/177?cb=20190325172431', 
  ),
  const Hero(
     heroname: 'Miya',
     role:'MarksMan',
     urlAvatar:'https://gamingonphone.com/wp-content/uploads/2020/12/Miya-MLBB.jpg', 
  ),
];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: NavigationDrawer(),
      appBar: AppBar(
        title: const Text('All Heros'),
        backgroundColor: Colors.black,
      ),
      body: ListView.builder(
        itemCount: heros.length,
        itemBuilder: ((context, index) {
          final hero = heros[index];
            return Card(
          child: ListTile(
            leading: CircleAvatar(radius: 28,
            backgroundImage: NetworkImage(hero.urlAvatar),),
           title: Text(hero.heroname),
          subtitle: Text(hero.role),
          trailing: const Icon(Icons.arrow_forward),
          onTap: (){
            Navigator.of(context).push(MaterialPageRoute(
              builder: (context) => Hero1(hero: hero) ),);
          },          
          ),
        );
        }
        
       ),),
    );
  }  
}

class Hero1 extends StatelessWidget {
  const Hero1({super.key, required this.hero});
final Hero hero;
  @override
  Widget build(BuildContext context) {
    return  Scaffold(
      appBar: AppBar(
        title: Text('Detials'),
        backgroundColor: Colors.black,
      ),
      drawer: const NavigationDrawer(),
      body: Column(
        children: [
          Image.asset(hero.urlAvatar,
          height: 300,
          width: double.infinity,
          fit: BoxFit.cover,),
          Text(hero.heroname,
          style: const TextStyle(fontSize: 40,
          fontWeight: FontWeight.bold,
          ),)
          

        ],
      ),
    );
  }
}
