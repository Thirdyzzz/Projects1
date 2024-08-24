import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:onlypantsit14/models/products.dart';

import 'package:onlypantsit14/models/shop.dart';
import 'package:onlypantsit14/models/orders.dart' as Orders;
import 'package:onlypantsit14/theme/colors.dart';
import 'package:provider/provider.dart';

class CustomerOrder extends StatefulWidget {
  const CustomerOrder({Key? key});

  @override
  State<CustomerOrder> createState() => _CustomerOrderState();
}

class _CustomerOrderState extends State<CustomerOrder> {
  TextEditingController fnamecontroller = TextEditingController();
  TextEditingController addresscontroller = TextEditingController();
  TextEditingController contactNumbercontroller = TextEditingController();
  TextEditingController messagecontroller = TextEditingController();
  TextEditingController totalpricecontroller = TextEditingController();

  late String errormessage;
  late bool isError;

  @override
  void initState() {
    errormessage = "This is an error";
    isError = false;
    super.initState();
  }

  @override
  void dispose() {
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Consumer<Shop>(
      builder: (context, value, child) => Scaffold(
        appBar: AppBar(
          title: const Text(
            'Go Back',
            style: TextStyle(fontSize: 15),
          ),
          leading: IconButton(
            onPressed: () {
              Navigator.pop(context);
            },
            icon: const Icon(Icons.arrow_back),
          ),
        ),
        body: Center(
          child: Container(
            margin: const EdgeInsets.symmetric(horizontal: 25),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  'CUSTOMER ORDER DETAILS',
                  style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 25),
                Container(
                  height: 50,
                  child: TextField(
                    controller: fnamecontroller,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Full Name',
                      prefixIcon: Icon(
                        Icons.person,
                        color: primaryColor,
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 15),
                Container(
                  height: 50,
                  child: TextField(
                    controller: addresscontroller,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Address',
                      prefixIcon: Icon(
                        Icons.pin_drop_outlined,
                        color: primaryColor,
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 15),
                Container(
                  height: 50,
                  child: TextField(
                    controller: contactNumbercontroller,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Contact No.',
                      prefixIcon: Icon(
                        Icons.phone_callback_outlined,
                        color: primaryColor,
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 15),
                Container(
                  height: 50,
                  child: TextField(
                    controller: messagecontroller,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: 'Message',
                      prefixIcon: Icon(
                        Icons.mark_email_read_outlined,
                        color: primaryColor,
                      ),
                    ),
                  ),
                ),
                // Display the selected items from the cart
                Expanded(
                  child: ListView.builder(
                    itemCount: value.cart.length,
                    itemBuilder: (context, index) {
                      final Product product = value.cart[index];
                      final int quantity = value.getQuantity(product);

                      // Check if the current product is the same as the previous one
                      if (index == 0 ||
                          product.id != value.cart[index - 1].id) {
                        return ListTile(
                          leading: Image.network(
                            product.imageUrl,
                            height: 50,
                            width: 50,
                          ),
                          title: Text("${product.pname} x $quantity"),
                          subtitle: Text(
                            "Price: PHP ${double.parse(product.pprice as String).toStringAsFixed(2)}",
                            style: TextStyle(fontWeight: FontWeight.bold),
                          ),
                        );
                      } else {
                        // Display an empty container for duplicated items
                        return Container();
                      }
                    },
                  ),
                ),
                const SizedBox(height: 15),
                Container(
                  height: 50,
                  width: 450,
                  decoration: BoxDecoration(
                    color: primaryColor,
                    borderRadius: BorderRadius.circular(10),
                  ),
                  child: TextButton(
                    onPressed: () {
                      createOrder(value);
                    },
                    child: const Text(
                      'PURCHASE',
                      style: TextStyle(
                        color: Colors.white,
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 15),
                (isError)
                    ? Text(
                        errormessage,
                        style: errortxtstyle,
                      )
                    : Container(),
              ],
            ),
          ),
        ),
      ),
    );
  }

  var errortxtstyle = const TextStyle(
    fontWeight: FontWeight.bold,
    color: Colors.red,
    letterSpacing: 1,
    fontSize: 18,
  );

  Future createOrder(Shop value) async {
    try {
      if (fnamecontroller.text.isEmpty || addresscontroller.text.isEmpty) {
        setState(() {
          isError = true;
          errormessage = "Full Name and Address are required fields.";
        });
        return;
      }

      final docOrder = FirebaseFirestore.instance.collection('Order').doc();

      // Create a list to store product details in the order
      List<Map<String, dynamic>> productsList = [];

      // Iterate through the cart and add each product's details to the list
      for (final Product product in value.cart) {
        final int quantity = value.getQuantity(product);

        // Add product details to the list
        productsList.add({
          'imageUrl': product.imageUrl,
          'productName': product.pname,
          'quantity': quantity,
        });
      }

      // Create a new Order instance with product details included
      final newOrder = Orders.Order(
        id: docOrder.id,
        fname: fnamecontroller.text,
        address: addresscontroller.text,
        contactNumber: contactNumbercontroller.text,
        message: messagecontroller.text,
        totalprice: value.calculateTotal().toString(),
        products: productsList,
      );

      final json = newOrder.toJson();
      await docOrder.set(json);

      setState(() {
        isError = false;
        errormessage = "";
        fnamecontroller.text = "";
        addresscontroller.text = "";
        messagecontroller.text = "";
        totalpricecontroller.text = value.calculateTotal().toString();
        Navigator.pop(context);
        Navigator.pop(context);
      });
    } catch (error) {
      setState(() {
        isError = true;
        errormessage = "Error creating the order. Please try again.";
      });
    }
  }
}
