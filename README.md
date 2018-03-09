# Midiano


Midiano is a database of good quality [MIDI](https://en.wikipedia.org/wiki/MIDI) files suitable for piano tutorial using softwares like [Synthesia](http://www.synthesiagame.com/).

## Setup development environment

This project uses [Homestead](https://laravel.com/docs/5.6/homestead), a virtual machine to have a quick and easy to use development environment, but it still needs a few requirements to work as expected.

### Requirements

* [PHP](http://php.net/downloads.php) (7.2.3)
* [Vagrant](https://www.vagrantup.com/downloads.html) (2.0.2)
* [Virtual Box](https://www.virtualbox.org/wiki/Downloads) (5.2.8)

### Boot the VM

Go to the project's root folder and launch:

`vagrant up`

### Update the hosts file

Add this line to your hosts file:

`192.168.10.10  midiano.test`

The site should now be available going to https://midiano.test with your browser.