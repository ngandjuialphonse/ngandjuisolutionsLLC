# Use an official lightweight Node.js as a parent image
FROM nginx:alpine

# Set the working directory
WORKDIR /usr/share/nginx/

# Copy the current directory contents into the container at /usr/share/nginx/html
COPY . .

# Expose port 80
EXPOSE 80

# Start Nginx and keep it running in the foreground
CMD ["nginx", "-g", "daemon off;"]
