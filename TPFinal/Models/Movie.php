<?php

namespace Models;

class Movie {
    private $popularity;
    private $vote_count;
    private $video;
    private $poster_path;
    private $id;
    private $adult;
    private $backdrop_path;
    private $original_language;
    private $original_title;
    private $genre_ids;
    private $title;
    private $vote_average;
    private $overview;
    private $release_date; 

    public function __construct()
    {
        
    }
    

    /**
     * Get the value of populrity
     */ 
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * Set the value of populrity
     *
     * @return  self
     */ 
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * Get the value of vote_count
     */ 
    public function getVote_count()
    {
        return $this->vote_count;
    }

    /**
     * Set the value of vote_count
     *
     * @return  self
     */ 
    public function setVote_count($vote_count)
    {
        $this->vote_count = $vote_count;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get the value of poster_path
     */ 
    public function getPoster_path()
    {
        return $this->poster_path;
    }

    /**
     * Set the value of poster_path
     *
     * @return  self
     */ 
    public function setPoster_path($poster_path)
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of adult
     */ 
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set the value of adult
     *
     * @return  self
     */ 
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get the value of backdrop_path
     */ 
    public function getBackdrop_path()
    {
        return $this->backdrop_path;
    }

    /**
     * Set the value of backdrop_path
     *
     * @return  self
     */ 
    public function setBackdrop_path($backdrop_path)
    {
        $this->backdrop_path = $backdrop_path;

        return $this;
    }

    /**
     * Get the value of original_language
     */ 
    public function getOriginal_language()
    {
        return $this->original_language;
    }

    /**
     * Set the value of original_language
     *
     * @return  self
     */ 
    public function setOriginal_language($original_language)
    {
        $this->original_language = $original_language;

        return $this;
    }

    /**
     * Get the value of original_title
     */ 
    public function getOriginal_title()
    {
        return $this->original_title;
    }

    /**
     * Set the value of original_title
     *
     * @return  self
     */ 
    public function setOriginal_title($original_title)
    {
        $this->original_title = $original_title;

        return $this;
    }

    /**
     * Get the value of genre_ids
     */ 
    public function getGenre_ids()
    {
        return $this->genre_ids;
    }

    /**
     * Set the value of genre_ids
     *
     * @return  self
     */ 
    public function setGenre_ids($genre_ids)
    {
        $this->genre_ids = $genre_ids;

        return $this;
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
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of vote_average
     */ 
    public function getVote_average()
    {
        return $this->vote_average;
    }

    /**
     * Set the value of vote_average
     *
     * @return  self
     */ 
    public function setVote_average($vote_average)
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    /**
     * Get the value of overview
     */ 
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set the value of overview
     *
     * @return  self
     */ 
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }
}


?>