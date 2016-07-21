#Frameworks
 Laravel PHP Framework
 Bootstrap

#Installation

Als erstes benötigen wir composer. Unter Mac am einfachsten mit Homebrew zu installieren "brew install homebrew/php/composer"
Dann benötigen wir das git Projekt (clone)

Der apache Server sollte so eingestellt sein, dass er auf den public Ordner des Projekts zeigt.
(bei weißer Seite chown -R www-data:www-data auf die Ordner public/ /storage /bootstrap/cache)

Theoretisch sollte die Webapplikation nun bereits laufen - zumindest bei der / Seite.
Als nächstes bearbeiten wir die /config/database.php Datei und geben die Postgresql daten an.

Im nächsten Schritt klicken wir in der Applikation auf import (ich hatte selbst meinen Apache nicht eingestellt ich hoffe die routen stimmen alle) ... Der Import dauert auf Grund der riesen TrackList.xml Datei eine weile... PHP sollte so eingestellt sein, dass es niemals stoppt damit der import durchläuft.

Anschließend sind die Daten importiert und man kann sich die listen aller manufacturer, labels, tracks im einzelnen ansehen... sie sind alle paginiert und nach ihren IDs durchsuchbar ...

sollten die Links nicht funktionieren, bitte folgendes Links verwenden
/labels
/manufacturers
/tracks

hinter allen links kann man ebenfalls folgendes eintragen:
?search=X wobei X natürlich der eingetragene Wert ist.

PS: 4 Std. knapp geschafft die Namen sind echt ein wenig kompliziert :)
