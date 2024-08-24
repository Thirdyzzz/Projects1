import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:onlypantsit14/CRUD/admin_view.dart';
import 'package:onlypantsit14/firebase_options.dart';
import 'package:onlypantsit14/login/adminlogin.dart';
import 'package:onlypantsit14/login/login_page.dart';
import 'package:onlypantsit14/login/register.dart';
import 'package:onlypantsit14/models/shop.dart';
import 'package:onlypantsit14/user/cart.dart';
import 'package:onlypantsit14/user/customer_order.dart';
import 'package:onlypantsit14/user/customerview.dart';
import 'package:onlypantsit14/CRUD/order_summary.dart';
import 'package:provider/provider.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(
    options: DefaultFirebaseOptions.currentPlatform,
  );

  runApp(ChangeNotifierProvider(
    create: (context) => Shop(),
    child: const MyApp(),
  ));
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: const Login(),
      routes: {
        'order_summary': (context) => OrderSummaryPage(),
        '/customerview': (context) => CustomerView(),
        '/cart': (context) => const Cart(),
        '/customer_order': (context) => const CustomerOrder(),
        '/register': (context) => const Register(),
        '/login': (context) => const Login(),
        '/adminlogin': (context) => const AdminLogin(),
        '/admin_view': (context) => const ProductData()
      },
    );
  }
}
