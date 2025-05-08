FROM node:18-alpine

# Install system tools
RUN apk add --no-cache git python3 make g++

# Install Angular CLI
RUN npm install -g @angular/cli@latest

# Create and set working directory
WORKDIR /usr/src/app

# Copy package files first
COPY package*.json ./

# Install project dependencies
RUN npm install

# Copy all files
COPY . .

# Expose port and start command
EXPOSE 4200
CMD ["ng", "serve", "--host", "0.0.0.0", "--poll=1000", "--disable-host-check"]