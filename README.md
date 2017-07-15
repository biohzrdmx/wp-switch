WordPress Switcher
==================

_Develop all your sites under a single WordPress instance_

This tool allows you to use a single WordPress codebase with an unlimited ammount of sites, one at a time; you may even have a completely different set of plugins, themes and uploads for each site!

How does it work? By overwriting the `wp-config.php` file based on a profile, which contains all the essential WordPress configuration and specifying a custom `wp-content` folder for each site.

You may apply and existing profile or even generate one based on the current contents of the `wp-config.php` file.

## Usage ##

For a simple start, make sure you have a properly configured WordPress instance (that is, there's a `wp-config.php` file on its root folder).

- Clone or download the repo
- Copy the `wp-sites` and `wp-switch` folders into the root of your WordPress folder
- Now comes the tricky part. Create a folder inside the `wp-sites` with the name of your site, say 'blog'
- **Move** the `wp-content` folder **inside** your recently created `wp-sites/blog` folder
- Go to your browser and navigate to the location of the installed WordPress and append `wp-switch` at the end, say 'http://localhost/wordpress/wp-switch'
- Now, in the 'Generate profile' section enter a name (say 'blog') and click the button
- You should have a new `blog.json` file on the `wp-switch/profiles` folder, open it up with your favorite code editor
- Check the line that contains `WP_CONTENT_DIR` (it's the line 8 or so), modify its value so it becomes something like `wp-sites/blog/wp-content` depending on the name you used for the folder you created in step 3

There you have, a completely isolated WordPress site.

Now you may create more folders inside `wp-sites` and place other sites there, copy its `wp-config.php` file over the original and create profiles for each of them.

Once you have two or more, you may want to go back to your browser and navigate to 'http://localhost/wordpress/wp-switch' again.

Then you'll see all your profiles for all your sites. Pick one and click on the blue button to the right of its row.

Once the process ends, go to your WordPress at 'http://localhost/wordpress' and you'll see the site you just picked, complete with images, posts, plugins, etc.

Pick another site. And another. Everytime you'll have a different site, on the same WordPress instance.

To deploy to your server, simply upload its `wp-content` folder and the database.

This way, you can keep ALL your sites under a SINGLE WordPress installation and choose which one you'll want to work with, just by the click of a button.

## Issues and troubleshooting ##

First of all, you are using this tool at your own risk.

By using it, you are freeing the author of any responsibility, as he will not, in any case, be liable for damages caused by the use or misuse of this tool.

So, now that we agree to the fact that you are a knowledgeable developer that knows how to do stuff with WordPress let's discuss about issues and troubleshooting.

If you've found a bug or have a nice suggestion don't hesitate to open an Issue and I'll try to check it out on a timely basis.

You may fork the repo if you want, make some fixes/additions and send back a Pull-request if you like.

This may not work on some development environments (I've tested only on Windows with XAMPP) so your mileage may vary depending on your computer settings.

Also, and I can't stress this enough: **THIS IS NOT INTENDED FOR USE ON LIVE/PRODUCTION SERVERS**

## License ##

MIT License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.