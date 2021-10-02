curl -X GET "localhost:8080/admin"

curl -X POST "localhost:8080/admin" -H 'Content-Type: application/json' -d'
{
  "email": "micheal92@example.org",
  "password": "test"
}
'

curl -X POST "localhost:8080/admin/4271" -H 'Content-Type: application/json' -d'
{
  "email": "micheal92@example.org",
  "id": 4271,
  "password": "test"
}
'

curl -X GET "localhost:8080/admin/4271"

curl -X DELETE "localhost:8080/admin/4271"

# --

curl -X GET "localhost:8080/applications"

curl -X POST "localhost:8080/applications" -H 'Content-Type: application/json' -d'
{
  "attachment": "Series fly close another four could notice. Fund act hard. Serve material cut race.",
  "cover_letter": "Provide suggest fund blood. Discuss response force challenge story again kind.",
  "created": "2021-09-27 23:11:50",
  "email": "pwalker@example.net",
  "full_name": "defense",
  "job_id": 1102,
  "location": "someone",
  "token": "year",
  "websites": "Third out middle officer main because capital. Beyond gun between."
}
'

curl -X POST "localhost:8080/applications/9594" -H 'Content-Type: application/json' -d'
{
  "attachment": "Series fly close another four could notice. Fund act hard. Serve material cut race.",
  "cover_letter": "Provide suggest fund blood. Discuss response force challenge story again kind.",
  "created": "2021-09-27 23:11:50",
  "email": "pwalker@example.net",
  "full_name": "defense",
  "id": 9594,
  "job_id": 1102,
  "location": "someone",
  "token": "year",
  "websites": "Third out middle officer main because capital. Beyond gun between."
}
'

curl -X GET "localhost:8080/applications/9594"

curl -X DELETE "localhost:8080/applications/9594"

# --

curl -X GET "localhost:8080/banlist"

curl -X POST "localhost:8080/banlist" -H 'Content-Type: application/json' -d'
{
  "created": "2021-10-12 09:18:53",
  "type": "soon",
  "value": "system"
}
'

curl -X POST "localhost:8080/banlist/5471" -H 'Content-Type: application/json' -d'
{
  "created": "2021-10-12 09:18:53",
  "id": 5471,
  "type": "soon",
  "value": "system"
}
'

curl -X GET "localhost:8080/banlist/5471"

curl -X DELETE "localhost:8080/banlist/5471"

# --

curl -X GET "localhost:8080/blocks"

curl -X POST "localhost:8080/blocks" -H 'Content-Type: application/json' -d'
{
  "content": "Thought same mission theory anything happen investment. Ever amount strong run network benefit.",
  "name": "official",
  "url": "majority"
}
'

curl -X POST "localhost:8080/blocks/2349" -H 'Content-Type: application/json' -d'
{
  "content": "Thought same mission theory anything happen investment. Ever amount strong run network benefit.",
  "id": 2349,
  "name": "official",
  "url": "majority"
}
'

curl -X GET "localhost:8080/blocks/2349"

curl -X DELETE "localhost:8080/blocks/2349"

# --

curl -X GET "localhost:8080/categories"

curl -X POST "localhost:8080/categories" -H 'Content-Type: application/json' -d'
{
  "description": "number",
  "name": "dark",
  "sort": 8121,
  "url": "can"
}
'

curl -X POST "localhost:8080/categories/3796" -H 'Content-Type: application/json' -d'
{
  "description": "number",
  "id": 3796,
  "name": "dark",
  "sort": 8121,
  "url": "can"
}
'

curl -X GET "localhost:8080/categories/3796"

curl -X DELETE "localhost:8080/categories/3796"

# --

curl -X GET "localhost:8080/cities"

curl -X POST "localhost:8080/cities" -H 'Content-Type: application/json' -d'
{
  "description": "morning",
  "name": "reduce",
  "sort": 7526,
  "url": "factor"
}
'

curl -X POST "localhost:8080/cities/2999" -H 'Content-Type: application/json' -d'
{
  "description": "morning",
  "id": 2999,
  "name": "reduce",
  "sort": 7526,
  "url": "factor"
}
'

curl -X GET "localhost:8080/cities/2999"

curl -X DELETE "localhost:8080/cities/2999"

# --

curl -X GET "localhost:8080/jobs"

curl -X POST "localhost:8080/jobs" -H 'Content-Type: application/json' -d'
{
  "category": 170,
  "city": 8223,
  "company_name": "quickly",
  "created": "2021-09-30 04:22:46",
  "description": "American reason past picture need impact. Suddenly company way budget use woman poor. Public few quickly whether thing statement charge.",
  "email": "diana77@example.org",
  "how_to_apply": "Become dog play case ask. Home Congress political kitchen behind be.",
  "is_featured": 6595,
  "logo": "Catch report but former. Situation ahead reach business.",
  "perks": "Usually necessary common million ground Republican. One office stuff friend.",
  "status": 9516,
  "title": "street",
  "token": "size",
  "url": "Yet fast fund ball hotel. Market child green everyone that window eight. Plan impact station appear seat. Body even inside raise."
}
'

curl -X POST "localhost:8080/jobs/9291" -H 'Content-Type: application/json' -d'
{
  "category": 170,
  "city": 8223,
  "company_name": "quickly",
  "created": "2021-09-30 04:22:46",
  "description": "American reason past picture need impact. Suddenly company way budget use woman poor. Public few quickly whether thing statement charge.",
  "email": "diana77@example.org",
  "how_to_apply": "Become dog play case ask. Home Congress political kitchen behind be.",
  "id": 9291,
  "is_featured": 6595,
  "logo": "Catch report but former. Situation ahead reach business.",
  "perks": "Usually necessary common million ground Republican. One office stuff friend.",
  "status": 9516,
  "title": "street",
  "token": "size",
  "url": "Yet fast fund ball hotel. Market child green everyone that window eight. Plan impact station appear seat. Body even inside raise."
}
'

curl -X GET "localhost:8080/jobs/9291"

curl -X DELETE "localhost:8080/jobs/9291"

# --

curl -X GET "localhost:8080/pages"

curl -X POST "localhost:8080/pages" -H 'Content-Type: application/json' -d'
{
  "content": "Popular contain human other once free. Turn win film point walk political.",
  "description": "see",
  "name": "including",
  "url": "imagine"
}
'

curl -X POST "localhost:8080/pages/9847" -H 'Content-Type: application/json' -d'
{
  "content": "Popular contain human other once free. Turn win film point walk political.",
  "description": "see",
  "id": 9847,
  "name": "including",
  "url": "imagine"
}
'

curl -X GET "localhost:8080/pages/9847"

curl -X DELETE "localhost:8080/pages/9847"

# --

curl -X GET "localhost:8080/subscriptions"

curl -X POST "localhost:8080/subscriptions" -H 'Content-Type: application/json' -d'
{
  "category_id": 2159,
  "city_id": 9250,
  "created": "2021-09-19 11:19:41",
  "email": "rodriguezchristian@example.com",
  "is_confirmed": 8036,
  "last_sent": "2021-10-15 23:04:32",
  "token": "air"
}
'

curl -X POST "localhost:8080/subscriptions/3714" -H 'Content-Type: application/json' -d'
{
  "category_id": 2159,
  "city_id": 9250,
  "created": "2021-09-19 11:19:41",
  "email": "rodriguezchristian@example.com",
  "id": 3714,
  "is_confirmed": 8036,
  "last_sent": "2021-10-15 23:04:32",
  "token": "air"
}
'

curl -X GET "localhost:8080/subscriptions/3714"

curl -X DELETE "localhost:8080/subscriptions/3714"

# --

