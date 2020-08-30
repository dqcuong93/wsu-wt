DROP DATABASE IF EXISTS wt19789590;
CREATE DATABASE wt19789590;
USE wt19789590;


-- DROP TABLE Authorship, Report, Book, Author, Reviewer;

CREATE TABLE Book (
  bookId VARCHAR(10) PRIMARY KEY,
  title VARCHAR(100) NOT NULL
);

CREATE TABLE Author (
  authorId VARCHAR(10) PRIMARY KEY,
  authorName VARCHAR(50) NOT NULL
);

CREATE TABLE Reviewer (
  reviewerId VARCHAR(10) PRIMARY KEY,
  reviewerName VARCHAR(50) NOT NULL
);


CREATE TABLE Authorship (
  bookId VARCHAR(10),
          FOREIGN KEY (bookId) REFERENCES Book(bookId) ON UPDATE CASCADE,
  authorId VARCHAR(10),
          FOREIGN KEY (authorId) REFERENCES Author(authorId) ON UPDATE CASCADE,
  PRIMARY KEY (bookId, authorId)
);

CREATE TABLE Report (
  bookId VARCHAR(10),
          FOREIGN KEY (bookId) REFERENCES Book(bookId) ON UPDATE CASCADE,
  reviewerId VARCHAR(10),
          FOREIGN KEY (reviewerId) REFERENCES Reviewer(reviewerId) ON UPDATE CASCADE,
  rating INT DEFAULT 1,
  reviewDate DATETIME,
  PRIMARY KEY (bookId, reviewerId)
);


-- insert some authors
INSERT INTO Author VALUES
('A001', 'John Lewis'),
('A002', 'William Loftus'),
('A003', 'Paul Deitel'),
('A004', 'David'),
('A005', 'Jessica'),
('A006', 'Chris');

-- insert some reviewers
INSERT INTO Reviewer VALUES ('R001', 'Donald');
INSERT INTO Reviewer VALUES ('R002', 'Vladimir');
INSERT INTO Reviewer VALUES ('R003', 'Theresa');

-- insert some books
INSERT INTO Book VALUES ('B001', 'Java Software Solutions');
INSERT INTO Book VALUES ('B002', 'Internet and World Wide Web');
INSERT INTO Book VALUES ('B003', 'Mathematics');

-- who wrote which books
INSERT INTO Authorship VALUES
('B001','A001'), ('B001','A002'),
('B002','A003'),
('B003','A004'), ('B003','A005'), ('B003','A006');

-- insert book report/reviews
INSERT INTO Report VALUES
('B001','R001', 5, '2018-06-21 11:11:59'),
('B001','R003', 4, '2018-09-24 11:11:59'),
('B002','R002', 4, '2018-07-22 12:11:59'),
('B002','R003', 5, '2018-10-25 12:11:59'),
('B003','R003', 3, '2018-08-23 13:11:59');

