import 'package:flutter/material.dart';
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
     urlAvatar:'https://vcgamers.com/news/wp-content/uploads/2022/05/moba1.png', 
  ),
];