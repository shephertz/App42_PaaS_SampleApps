json.array!(@users) do |user|
  json.extract! user, :name, :email, :phone, :biodata
  json.url user_url(user, format: :json)
end
