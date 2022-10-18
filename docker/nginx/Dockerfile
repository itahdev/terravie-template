FROM nginx:latest

RUN apt-get update
RUN apt-get install -y vim

WORKDIR /var/www/html

COPY ./public ./public
COPY docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80 443
CMD ["nginx", "-g", "daemon off;"]
