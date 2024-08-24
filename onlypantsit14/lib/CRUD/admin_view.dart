import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:onlypantsit14/CRUD/add_products.dart';
import 'package:onlypantsit14/CRUD/complete_order.dart';
import 'package:onlypantsit14/CRUD/order_summary.dart';
import 'package:onlypantsit14/CRUD/update_product.dart';

import 'package:onlypantsit14/models/products.dart';
import 'package:onlypantsit14/theme/colors.dart';

class ProductData extends StatefulWidget {
  const ProductData({Key? key});

  @override
  State<ProductData> createState() => _ProductDataState();
}

class _ProductDataState extends State<ProductData> {
  Future<void> _signOut() async {
    await FirebaseAuth.instance.signOut();
    Navigator.of(context).pushReplacementNamed('/login');
  }

  Future<void> deleteProduct(String id) async {
    final docProduct = FirebaseFirestore.instance.collection('Product').doc(id);
    docProduct.delete();
  }

  void navigateToUpdateProduct(Product product) {
    Navigator.of(context).push(
      MaterialPageRoute(
        builder: (context) => UpdateProduct(product: product),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 3,
      child: Scaffold(
        appBar: AppBar(
          title: Text(
            'Admin Panel',
            style:
                TextStyle(fontWeight: FontWeight.bold, color: Colors.grey[800]),
          ),
          centerTitle: true,
          automaticallyImplyLeading: false,
          actions: [
            IconButton(
              icon: Icon(Icons.logout),
              onPressed: () {
                _signOut();
              },
            ),
          ],
          bottom: TabBar(
            tabs: [
              Tab(
                icon: Icon(Icons.add_shopping_cart, color: primaryColor),
              ),
              Tab(
                icon: Icon(Icons.pending_actions_outlined, color: primaryColor),
              ),
              Tab(
                icon: Icon(Icons.check, color: primaryColor),
              ),
            ],
          ),
        ),
        body: TabBarView(
          children: [
            ProductDataTab(
              deleteProduct: deleteProduct,
              navigateToUpdateProduct: navigateToUpdateProduct,
            ),
            OrderSummaryPage(),
            CompleteOrderPage(
              orders: [],
            ),
          ],
        ),
      ),
    );
  }
}

class ProductDataTab extends StatelessWidget {
  final Stream<List<Product>> productStream =
      FirebaseFirestore.instance.collection('Product').snapshots().map(
            (snapshot) => snapshot.docs
                .map(
                  (doc) => Product.fromJson(
                    doc.data(),
                  ),
                )
                .toList(),
          );

  final Function(String) deleteProduct;
  final Function(Product) navigateToUpdateProduct;

  ProductDataTab({
    required this.deleteProduct,
    required this.navigateToUpdateProduct,
  });

  Widget buildList(Product product) => ListTile(
        leading: CircleAvatar(
          backgroundImage: NetworkImage(product.imageUrl),
        ),
        title: Text(
          product.pname,
          style: TextStyle(fontWeight: FontWeight.bold),
        ),
        subtitle: Text(product.pdescription),
        dense: true,
        onTap: () {},
        trailing: Row(
          mainAxisSize: MainAxisSize.min,
          children: [
            IconButton(
              onPressed: () {
                navigateToUpdateProduct(product);
              },
              icon: Icon(
                Icons.edit_outlined,
                color: primaryColor,
              ),
            ),
            IconButton(
              onPressed: () {
                deleteProduct(product.id);
              },
              icon: const Icon(
                Icons.delete_outline,
                color: Colors.red,
              ),
            )
          ],
        ),
      );

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Expanded(
          child: StreamBuilder<List<Product>>(
            stream: productStream,
            builder: (context, snapshot) {
              if (snapshot.hasError) {
                return Text('Something went wrong! ${snapshot.error}');
              } else if (snapshot.hasData) {
                final products = snapshot.data!;
                return ListView(
                  children:
                      products.map((product) => buildList(product)).toList(),
                );
              } else {
                return const Center(
                  child: CircularProgressIndicator(),
                );
              }
            },
          ),
        ),
        Padding(
          padding: const EdgeInsets.all(20.0),
          child: GestureDetector(
            onTap: () {
              Navigator.of(context).push(MaterialPageRoute(
                builder: (context) => const AddProduct(),
              ));
            },
            child: Container(
              padding: const EdgeInsets.all(12.0),
              decoration: BoxDecoration(
                color: primaryColor,
                borderRadius: BorderRadius.circular(10.0),
              ),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Icon(
                    Icons.add,
                    color: Colors.white,
                  ),
                  SizedBox(width: 8.0),
                  Text(
                    'Add Product',
                    style: TextStyle(
                      color: Colors.white,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }
}
