Developer Setup Guide
---------------------

I'm creating this guide because getting started can be overwhelming, and I wish it had existed when I first started. There are checkboxes next to each event so that you can keep track of your progress.

1. First thing, head over to our [Python Development Environment](https://confluence.truecarcorp.com/display/PRODUCT/Python+Development+Environment) setup guide on [Confluence](https://confluence.truecarcorp.com/).
- [ ] Done

2. Install libevent.
```
$ brew install libevent
```

This repository contains the following projects:

- truecar.com main website
- truecar.com mobile website
- truecar.com best local price service
- consumer reports apis and site

and other miscelanous projects


Development Environment Setup
------------------------------
_The following guide assumes you have a basic dev environment setup for python
development at TrueCar. (ie: git, python 2.7, virtualenv, virtualenvwrapper)
If you haven't set up python development environment, please follow the
[directions on confluence] before continuing._

[directions on confluence]: https://confluence.truecarcorp.com/display/Product/Python+Development+Environment


### Assumptions

- have Mavericks OS X 10.9.x or higher
- source code will live in ~/src/tc/tcdc-main
- virtualenv name is "tcdc"


### Prerequisites

You'll need to install the following dependencies, which are required by the
python pacakges used in pympp.

- boost
- libevent
- mysql connector (or client libs)
- java 6

On OS-X you can get these with brew:

    $ brew install boost --with-python  # takes significant time (sometimes 10+ minutes)
    $ brew install libevent mysql-connector-c

And Java 6:

    $ cd /tmp
    $ curl -OL "http://support.apple.com/downloads/DL1572/en_US/JavaForOSX2013-05.dmg"
    $ open JavaForOSX2013-05.dmg  # then install it.


### Bootstrapping a development environment

    $ cd ~/src/tc
    $ git clone --recursive git@git2.code.wc.truecarcorp.com:tcdc/tcdc-main.git
    $ git checkout {current-release-branch}}
    $ mkvirtualenv --python=/usr/local/Cellar/python/{version}/bin/python --no-site-packages tcdc
    (tcdc) $ cd ~/src/tc/tcdc-main/main-website
    (tcdc) $ pip install --index-url=http://pypi1.code.wc.truecarcorp.com/simple -r requirements.txt
    (tcdc) $ python setup.py develop
    (tcdc) $ add2virtualenv ~/src/tc/tcdc-main/common/py

### Configure your development environment

There are 2 files you need for development, that you should create and commit to source control:

* ``main-website/main_website/configs/localdev_{yourname}/settings.py`` - This is your django settings file for
development. You can copy this from a recent active developer, you should change all references of _``theirname``_ to
_``yourname``_.
* ``main-website/main_website/logging_config/{yourname}`` -  This is your logging config, logging can be noisy you'll
want this to customize logging preference for your tasks and environment.

Once you have created your settings and logging files, commit them.

### Get Configurator Data for your local environment
    
    $ sudo mkdir -p /opt/truecar/
    $ sudo chown -R {username}:staff /opt/truecar
    (tcdc) $ python main-website/manage.py get_sqlite_database

### Running a development server

    $ cd ~/src/tc/tcdc-main
    $ python main-website/manage.py runserver

### Running Tests

    $ python main-website/manage.py buildstatic
    $ python main-website/manage.py test
 
