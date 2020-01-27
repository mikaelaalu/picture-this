# picture-this
Creating an instagram clone

<img src="https://media.giphy.com/media/l0HlQXcnyJEYBVsxa/giphy.gif" width=100%; >

## About 
Scool assignment at Yrgo Web development program, creating your own instagram clone.

## Features
### Minimum requirement
- [x] As a user I should be able to create an account.

- [x] As a user I should be able to login.

- [x] As a user I should be able to logout.

- [x] As a user I should be able to edit my account email, password and biography.

- [x] As a user I should be able to upload a profile avatar image.

- [x] As a user I should be able to create new posts with image and description.

- [x] As a user I should be able to edit my posts.

- [x] As a user I should be able to delete my posts.

- [x] As a user I should be able to like posts.

- [x] As a user I should be able to remove likes from posts.

### Extra features

- [x] As a user I should be able to follow and unfollow other users.

- [x] As a user I should be able to view a list of posts by users I follow.

- [x] As a user I'm able to comment on a post.

- [x] As a user I'm able to delete my comments.

### Extra features added by <a href="https://github.com/emeliepetersson"> Emelie Petersson </a>

- [x] As a use I'm able to search and see a list of users by query.

- [x] As a user I'm able to add filters to my images.

View pull request <a href="https://github.com/mikaelaalu/picture-this/pull/1">here!</a> 


## Built With
* PHP
* JavaScript Vanilla
* SQLite
* HTML
* CSS

## Installation
1. To be able to try this Instagram clone, clone this repository to your directory through the terminal.
```
$ git clone https://github.com/mikaelaalu/picture-this.git
```
2. Change current directory to the cloned repo.
```
$ cd picture-this
```

3. Start your web server.
```
$ php -S localhost:8000
```

## Author
<a href="https://github.com/mikaelaalu"> Mikaela Lundsgård </a>

## Testers
* <a href ="https://github.com/OskarJoss" >Oskar Joss </a>
* <a href ="https://github.com/milliebase" >Betsy Alva Soplin </a>
* <a href ="https://github.com/jesperlndqvst" > Jesper Lundqvist </a>

## Code review
By <a href="https://github.com/alexandergustafssonflink"> Alexander Gustafsson Flink </a>

- Not logged in on signup. This could be fixed by fetching the registered user from the database and declaring it as SESSION[‘user’].

- In comment section you need to reload the page to see delete-button. If you make more than one comment you need to refresh page to see them.

- The class .post-img has a 100% width and 400px making the postimage squeeze into these measures. You could instead put the image in a div, set the measures to the div and then give the image a “object-fit : cover”-attribute, making it fit these measures without squeezing.

- Same as above goes for img.avatar.

- You could put function isLoggedin in your header to minimize the use of it.

- Section like-button and \$dateWithTime on following-php could use a few rows between them to get a clearer view on what’s what.

- You could shorten down $_SESSION[‘user’] to $user using a if isset in your header to dry your code.

- In the fetch-functions you declare adress localhost:8000, which will mean a problem if the application is launched from another port.

- In the following-table of the database you have two columns - user_id and profile_id. It’s not very clear which column is following which. Consider calling the tables user_id and follows_id, maybe.

- In the comments-table of the database you have column namned comment_id. You could just call it id, like you have done with the id in the posts-table.

## License
- This project is licensed under MIT License, see the [LICENSE](LICENSE) file for details.

YRGO 2019
