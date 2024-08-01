FROM mysql:5.7

# Set the root password
ENV MYSQL_ROOT_PASSWORD root

# Create the SQL folder
RUN mkdir /usr/sql
RUN chmod 777 /usr/sql

ADD ["./init.sql", "/usr/sql/init.sql"]

# Run the SQL script
RUN /usr/bin/mysql -u root -p $MYSQL_ROOT_PASSWORD < /usr/sql/init.sql