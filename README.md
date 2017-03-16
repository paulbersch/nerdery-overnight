# nerdery-overnight

Hola. Here we go:

1. Go to https://github.com/ChicagoWebFriends-irl/nerdery-overnight, log in if you haven't already and up at the top right, you'll see a little button that says Fork. Push it. It may ask you where you want to fork to, and chose where you want the fork to live (or your own account, which is fine.) You'll be taken to your fork of the nerdery-overnight repo. 
2. Just click clone or download and clone your version of the repo down to your machine. `git clone https://github.com/ChicagoWebFriends-irl/nerdery-overnight.git`
3. Because you cloned your fork as your new origin, that will now be your origin repo. But people will be adding new features and updates to the main repo. So how do you keep up? Easy! Set up the ChicagoWebFriends-irl/nerdery-overnight main repo as another remote. In terminal the command is `git remote add chiwebfriends https://github.com/ChicagoWebFriends-irl/nerdery-overnight.git`
4. To check your work use `git remote -v` You should see your own repo as origin and the ChicagoWebFriends-irl/nerdery-overnight repo as chiwebfriends 
5. Now, you can pull from this new remote to keep your fork up to date. Kind of like how git pull origin master updates your local repo. Only instead of origin, you're pulling from chiwebfriends. The command to update would be as such: `git pull chiwebfriends master`
6. Now you can make branches and try things and work to your heart's content, since you'll be doing it on your own fork. Just make sure to keep things updated if you want to be able to make a Pull Request. Maybe try making a branch, adding your name or an emoji to the README.md and commiting.
7. Now on to making that Pull Request. On github.com, go to your fork \<your name\>/nerdery-overnight. If you're lucky, a little orange bar shows up that says "Your recently pushed branches", the name of your branch and a button. If that happens, click the button. If not, click on the New Pull Request button on the left, chose the correct branch (the one with your Readme update) under the Compare dropdown on the left hand side and the orange bar should magically come up with the big green button. Make sure in both instances on the left, the Base Fork says ChicagoWebFriends-irl/nerdery-overnight, and the Base after says master and the Head Fork says \<your name\>/nerdery-overnight.
8. If github says "There isn't anything to compare" or some other such nonsense and doesn't let you make the PR, try `git pull chiwebfriends master` and then merging from your local version of master. Hopefully it's just that your fork isn't in sync. Beyond that, you can tap @here in our slack channel and someone can help you out. It's not always cut and dry, but we've seen it all.

## Check In
* Colt Borg 🐙🌮🐙