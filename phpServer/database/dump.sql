#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: categories
#------------------------------------------------------------

CREATE TABLE categories(
  id   Int  Auto_increment  NOT NULL ,
  name Varchar (50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE orders(
  id    Int  Auto_increment  NOT NULL ,
  price Float NOT NULL ,
  user_id     Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT orders_PK PRIMARY KEY (id)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: images
#------------------------------------------------------------

CREATE TABLE images(
  id   Int  Auto_increment  NOT NULL ,
  path Varchar (50) NOT NULL ,
  user_id    Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT images_PK PRIMARY KEY (id)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
  id          Int  Auto_increment  NOT NULL ,
  name        Varchar (50) NOT NULL ,
  description Text NOT NULL ,
  location    Varchar (50) NOT NULL ,
  date        Date NOT NULL ,
  price       Float NOT NULL ,
  user_id           Int NOT NULL ,
  image_id          Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT events_PK PRIMARY KEY (id)

  ,CONSTRAINT events_images0_FK FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comments
#------------------------------------------------------------

CREATE TABLE comments(
  id      Int  Auto_increment  NOT NULL ,
  content Text NOT NULL ,
  user_id         Int NOT NULL ,
  event_id        Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT comments_PK PRIMARY KEY (id)

  ,CONSTRAINT comments_events0_FK FOREIGN KEY (event_id) REFERENCES events(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: products
#------------------------------------------------------------

CREATE TABLE products(
  id          Int  Auto_increment  NOT NULL ,
  name        Varchar (50) NOT NULL ,
  description Text NOT NULL ,
  price       Float NOT NULL ,
  user_id             Int NOT NULL ,
  image_id            Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT products_PK PRIMARY KEY (id)

  ,CONSTRAINT products_images0_FK FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: images_past_events
#------------------------------------------------------------


CREATE TABLE images_past_events(
  id Int  Auto_increment  NOT NULL ,
  event_id            Int NOT NULL ,
  image_id            Int NOT NULL ,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT images_past_events_PK PRIMARY KEY (id)

  ,CONSTRAINT images_past_events_events_FK FOREIGN KEY (event_id) REFERENCES events(id)
  ,CONSTRAINT images_past_events_images0_FK FOREIGN KEY (image_id) REFERENCES images(id)
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: have
#------------------------------------------------------------

CREATE TABLE have(
  category_id Int NOT NULL ,
  product_id  Int NOT NULL
  ,CONSTRAINT have_PK PRIMARY KEY (category_id,product_id)

  ,CONSTRAINT have_categories_FK FOREIGN KEY (category_id) REFERENCES categories(id)
  ,CONSTRAINT have_products0_FK FOREIGN KEY (product_id) REFERENCES products(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contain
#------------------------------------------------------------

CREATE TABLE contain(
  order_id   Int NOT NULL ,
  product_id Int NOT NULL ,
  quantity   Int NOT NULL
  ,CONSTRAINT contain_PK PRIMARY KEY (order_id,product_id)

  ,CONSTRAINT contain_orders_FK FOREIGN KEY (order_id) REFERENCES orders(id)
  ,CONSTRAINT contain_products0_FK FOREIGN KEY (product_id) REFERENCES products(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participate
#------------------------------------------------------------

CREATE TABLE participate(
  event_id Int NOT NULL ,
  user_id  Int NOT NULL,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT participate_PK PRIMARY KEY (event_id,user_id)

  ,CONSTRAINT participate_events_FK FOREIGN KEY (event_id) REFERENCES events(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: like
#------------------------------------------------------------

CREATE TABLE `like`(
  images_past_events_id Int NOT NULL ,
  user_id             Int NOT NULL ,
  `created_at` timestamp NULL DEFAULT NOW(),
  `updated_at` timestamp NULL DEFAULT NOW()
  ,CONSTRAINT like_PK PRIMARY KEY (images_past_events_id,user_id)

  ,CONSTRAINT like_images_past_events_FK FOREIGN KEY (images_past_events_id) REFERENCES images_past_events(id)
)ENGINE=InnoDB;

