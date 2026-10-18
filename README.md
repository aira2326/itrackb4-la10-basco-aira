ITrackB4 — Lab Activity 9

 F1 — Nullable Column
I made the `description` column nullable. I chose this one because not every movie has a summary or synopsis available right away; title, director, and release year are always required information, but a description is extra and can be added later.

F2 — First Failed Step
The first failure happened when I tried to create a record in Tinker before adding `$fillable`. The error said `Add [title] to fillable property to allow mass assignment on [App\Models\Movie]`. It meant I needed to list which columns can be set using the `::create()` method.
 F3 — Why Blade Files Did Not Change
The pages still work because the controller passes variables with the **exact same names** (`$movies` and `$movie`) as before. The Blade templates only read variables — they do not care if the data came from a hardcoded array or a database table.