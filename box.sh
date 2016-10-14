#!/bin/bash

# -*- ENCODING: UTF-8 -*-

#proyecto=@@nombre_proyecto@@

if [[ $1 ]] || [[ $2 ]] || [[ $3 ]]; then

	if [[ $1 ]]; then
		if [[ $2 ]] || [[ $3 ]]; then
		    	echo ""
				for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
				echo -e '\E[37;44m'"\033[5m Vista "$2" creada y enlazada al layout "$1".php \033[0m"  
		    	echo ""
				for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
				echo -e '\E[37;44m'"\033[5m Controllador "$1" creado. \033[0m"  
		    	php artisan make:view $1.$2.$3 -e layouts.$1
		    	php artisan make:controller ${1^}Controller
		    	echo ${1^}
		    	for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
				echo ""
		else
			echo ""
			for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
			echo ""
			for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
			echo -e '\E[37;44m'"\033[5m Vista "$1" creada. \033[0m"  
			sudo ./html.sh $2 $3 $4 $proyecto
			for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
			echo ""
		fi
		#sudo ./html.sh $2 $3 $4 $proyecto
	fi
else
	echo ""
	for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
	echo -e "\e[1m  Ingrese un comando ejemplo: box, stylus, migrar  \033[0m"
	echo ""
	echo -e "\e[1m Creador de vistas\033[0m"
	echo " Este comando genera automaticamente carpetas, vistas y contraladores partiendo de parametros de roles."
	echo -e "\e[7m ejemplo-> $ box admin archivos ingresar\033[0m"
	echo ""	
	for i in {0..75} {75..0} ; do echo -en "\e[38;5;256m-\e[0m" ; done ; echo
	echo ""
fi

