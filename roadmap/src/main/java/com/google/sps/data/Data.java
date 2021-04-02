package com.google.sps.data;

/** Data input by student. */
public final class Data {

  private final String college;
  private final String expectedGrad;
  private final String major;

  public Data(String college, String expectedGrad, String major) {
    this.college = college;
    this.expectedGrad = expectedGrad;
    this.major = major;
  }
}