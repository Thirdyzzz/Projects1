class Users1 {
  final String id;
  final String namehero;
  final String rolehero;
  final String winrate;
  final String matches;
  final String image;
  bool isLiked;

  Users1({
    required this.id,
    required this.namehero,
    required this.rolehero,
    required this.winrate,
    required this.matches,
    required this.image,
    required this.isLiked,
  });

  Map<String, dynamic> toJson() => {
        'id': id,
        'namehero': namehero,
        'rolehero': rolehero,
        'winrate': winrate,
        'matches': matches,
        'image': image,
        'isLiked': isLiked,
      };

  static Users1 fromJson(Map<String, dynamic> json) =>Users1(
         id: json['id'],
        namehero: json['namehero'],
        rolehero: json['rolehero'],
        winrate: json['winrate'],
        matches: json['matches'],
        image: json['image'],
        isLiked: json['isLiked'],
      );
}
