class Users {
  final String id;
  final String nameml;
  final String role;
  final String rank;
  final String imageUrl;
   

  Users({
    required this.id,
    required this.nameml,
    required this.role,
    required this.rank,
    required this.imageUrl,
    
  });

  Map<String, dynamic> toJson() => {
        'id': id,
        'nameml': nameml,
        'role': role,
        'rank': rank,
        'imageUrl': imageUrl,
        
      };

  static Users fromJson(Map<String, dynamic> json) => Users(
        id: json['id'],
        nameml: json['nameml'],
        role: json['role'],
        rank: json['rank'],
        imageUrl: json['imageUrl'],
       
      );
}
