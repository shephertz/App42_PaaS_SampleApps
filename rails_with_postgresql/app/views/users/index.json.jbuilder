json.array!(@users) do |user|
  json.extract! user, :name, :email, :desc
  json.url user_url(user, format: :json)
end
