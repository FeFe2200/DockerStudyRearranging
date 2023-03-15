# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cheolee <cheolee@student.42seoul.kr>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2022/10/24 15:01:42 by cheolee           #+#    #+#              #
#    Updated: 2022/10/24 15:03:06 by cheolee          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

all : up

up :
	sudo docker-compose -f srcs/docker-compose.yml up -d --build

down :
	sudo docker-compose -f srcs/docker-compose.yml down

fdown :
	sudo docker stop $$(sudo docker ps -a -q)
	sudo docker rm $$(sudo docker ps -a -q)
	sudo docker rmi -f $$(sudo docker images -q)