class UserPost {
  final String userimg;
  final String username;
  final String time;
  final String post_id;
  final String postcontent;
  final String postimg;
  final String numcomments;
  final String numshare;
  bool isLiked;

  UserPost({
    required this.userimg,
    required this.username,
    required this.time,
    required this.post_id,
    required this.postcontent,
    required this.postimg,
    required this.numcomments,
    required this.numshare,
    required this.isLiked,
  });

  Map<String, dynamic> toJson() => {
        'userimg': userimg,
        'username': username,
        'time': time,
        'post_id': post_id,
        'postcontent': postcontent,
        'postimg': postimg,
        'numcomments': numcomments,
        'numshare': numshare,
        'isLiked': isLiked,
      };

  static UserPost fromJson(Map<String, dynamic> json) => UserPost(
        userimg: json['userimg'],
        username: json['username'],
        time: json['time'],
        post_id: json['post_id'],
        postcontent: json['postcontent'],
        postimg: json['postimg'],
        numcomments: json['numcomments'],
        numshare: json['numshare'],
        isLiked: json['isLiked'],
      );
}