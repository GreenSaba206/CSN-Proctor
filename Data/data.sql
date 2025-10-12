CREATE TABLE students (
  first_name TEXT NOT NULL,
  last_name  TEXT NOT NULL,
  student_id TEXT UNIQUE,
  email      TEXT NOT NULL
);

CREATE INDEX index_student_ids ON students(student_id);

CREATE TABLE teachers (
  first_name TEXT NOT NULL,
  last_name  TEXT NOT NULL,
  faculty_id TEXT UNIQUE,
  email      TEXT NOT NULL
);

CREATE INDEX index_faculty_ids  ON teachers(faculty_id);