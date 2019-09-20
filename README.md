![SpanishDefine Logo](https://www.spanishdefine.com/resources/logo/spanishdefine_logo_header.png)

SpanishDefine
===============
Repository for [SpanishDefine.com](https://spanishdefine.com).
Hosts changelog & localhost version of SpanishDefine.com (live version slightly modified).

The Website & the Service it Provides
-------------------------------------
SpanishDefine is a service created to solve the inconveniences of having to manually look up definitions and conjugations for Spanish words. This website was introduced as a solution to this problem, and is still being updated and maintained. The primary purpose of this repository is to provide a changelog seperate from the website to track progress and improvements. It also hosts the files for the local version SpanishDefine.com (i.e. the version without SQL & database keys).

Changelog
---------

##### August 25th, 2019
* Fixed JS form script to avoid bug related to the Paypal button

### August 2nd, 2019 ---> NEW VERSION
* Complete internal redesign; Use of AJAX, heavier reliance on Javascript
* No more PHP page reloads to fulfill definition/conjugation requests (PERFORMANCE INCREASE)
* Basic input cleaning & wrong input feedback
* Significant design improvements, particularly with conjugation selection
* MOBILE SUPPORT! Dynamic resizing and readability

<p align="center">
<img src="https://github.com/vasilzhigilei/SpanishDefine/blob/master/ver2.PNG" height="400px"></img>
<img src="https://github.com/vasilzhigilei/SpanishDefine/blob/master/ver1.PNG" height="400px"></img>
</p>

<h6 align="center"><i>[New version (left) vs previous version (right)]</i></h6>

##### May 26th, 2019
* Basic dictionary functionality implemented
* "How to use" panel written
* Migration of changelog to GitHub.com/vasilzhigilei
* Inclusion of a donation button
##### May 20th, 2019
* Conjugation completely reworked
* Inclusion of SQL database for all verbs and corresponding conjugations
* Reworked conjugation selection interface
* Basic output of all conjugations
* Temporarily disabled random background images
* Updated about page
##### May 11th, 2019
* Domain registered, hosting set up
* Original basic version of website uploaded with disabled fetching of conjugations
