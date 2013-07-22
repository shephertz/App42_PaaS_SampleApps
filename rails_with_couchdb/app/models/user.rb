class User < CouchRest::Model::Base
  property :name, String 
  property :email, String 
  property :phone, Integer
  property :biodata

end
