class Users {
  final String id;
  final String name;
  final String password;
  final String email;
  final String image;
  final String contactnumber;

  Users({
    required this.id,
    required this.name,
    required this.password,
    required this.email,
    required this.image,
    required this.contactnumber,
  });

  Map<String, dynamic> toJson() => {
        'id': id,
        'password': password,
        'name': name,
        'email': email,
        'image': image,
        'contactnumber': contactnumber,
      };

  static Users fromJson(Map<String, dynamic> json) => Users(
        id: json['id'],
        name: json['name'],
        password: json['password'],
        email: json['email'],
        image: json['image'],
        contactnumber: json['contactnumber'],
      );
}
