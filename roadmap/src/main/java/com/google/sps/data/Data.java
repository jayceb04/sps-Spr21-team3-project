package com.google.sps.data;

/** Data input by student. */
public final class Data {

  private final String college;
  private final String graduationDate;
  private final String major;

  public Data(String college, String graduationDate, String major) {
    this.college = college;
    this.graduationDate = graduationDate;
    this.major = major;
  }
}