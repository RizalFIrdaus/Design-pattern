<?php

namespace Rizal\DesignPattern\adapter;


class Book
{
    public function __construct(
        public string $author,
        public string $title,
        public int $pages,
    ) {
    }




    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of pages
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set the value of pages
     *
     * @return  self
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

        /**
         * Get the value of author
         */
        public function getAuthor()
        {
                return $this->author;
        }

        /**
         * Set the value of author
         */
        public function setAuthor($author): self
        {
                $this->author = $author;

                return $this;
        }
}
