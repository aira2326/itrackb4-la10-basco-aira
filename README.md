 
 G1 — Column turned into a table
I turned the `genre` column into its own `genres` table because genre is drawn from a fixed list, the same values repeat across many movies, and it could one day need extra details like a description or category. Fields like `year` or `is_featured` are just raw values and don't need their own table.

 G2 — Screenshot 6 query count
Screenshot 6 showed **7 queries**: 1 to fetch all 6 movies, then 6 separate queries — one for each movie's genre — because of lazy loading (the N+1 problem). After adding `with('genre')`, it dropped to **2** queries total.

 G3 — Why belongsTo must be singular
If I named the method `genres()` (plural) instead of `genre()`, Eloquent would look for a foreign key column called `genres_id` instead of `genre_id`. Since that column doesn't exist, every `$movie->genre` call would fail or return null.