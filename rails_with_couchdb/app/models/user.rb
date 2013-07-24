class User < CouchRest::Model::Base
  property :name, String
  property :email, String
  property :desc, String
end
