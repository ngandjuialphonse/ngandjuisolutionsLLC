# Use the official image as a parent image
FROM httpd:2.4

# Optional: Update the default Apache configuration
#COPY ./my-httpd.conf /usr/local/apache2/conf/httpd.conf

# Copy the content of your site into the document root
COPY ./html/ /usr/local/apache2/htdocs/

# Expose port 80
EXPOSE 80

