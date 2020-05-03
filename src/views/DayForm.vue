<template>
  <div>
    <vue-scroll-progress-bar
      @complete="handleComplete"
      height="1rem"
      backgroundColor="navy"
    />
    <fish-card fluid color="teal">
      <div slot="header">
        <h3 class="head">
          <vue-fontawesome icon="copy" size="2"></vue-fontawesome
          >แบบบันทึกการตรวจสอบและบำรุงรักษาประจำวัน
        </h3>
      </div>
      <fish-form ref="form" inline>
        <fish-field
          span="6"
          label="วันที่ตรวจสอบและบำรุงรักษา"
          name="dateservice"
        >
          <!-- format from moment js L = DD/MM/YYYY -->
          <fish-date-picker
            v-model="input.dateservice"
            hint="ระบุวันที่"
            format="L"
          ></fish-date-picker>
        </fish-field>
      </fish-form>
      <fish-divider></fish-divider>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col3"><h4>บ่อเติมอากาศ</h4></div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2">
            <h4>เครื่องปั้มน้ำและเครื่องดักขยะ</h4>
          </div></fish-col
        >
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ตรวจสอบ</h4></div></fish-col
        >
        <fish-col span="4"
          ><div class="demo-col demo-col2"><h4>การบันทึก</h4></div></fish-col
        >
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="2" offset="5"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
        <fish-col span="2" offset="1"></fish-col>
        <fish-col span="2"></fish-col>
        <fish-col span="1" offset="1"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>ไม่ได้ใช้งาน</h4></div>
        </fish-col>
        <fish-col span="4" offset="1"> </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>สี กลิ่น ฟอง</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>Screen</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>เครื่องดักขยะบ่อสูบ</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="trap1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="trap2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="trap3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>

        <fish-col span="4" offset="1"
          ><div><h4>1. เมื่อตรวจสอบแล้วอุปกรณ์นั้น</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(แดงปนน้ำตาล,ไม่มีกลิ่น/ฟอง)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h4>บ่อเติม</h4></div>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pondcolor1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pondcolor2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-01</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 1</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpfailed1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ก. ทำงานปกติ
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col3 "><h4>บ่อตกตะก่อน</h4></div>
        </fish-col>
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>P-02</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบน้ำเสีย 2</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpfailed2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpfailed2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ข. ไม่มีเสียงดัง
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="2" offset="5"
          ><div class="demo-col demo-col2 "><h4>เช้า</h4></div>
        </fish-col>
        <fish-col span="2"
          ><div class="demo-col demo-col2 "><h4>บ่าย</h4></div>
        </fish-col>
        <fish-col span="2" offset="1"
          ><div class="demo-col demo-col2 ">
            <h4>P-03</h4>
          </div></fish-col
        >
        <fish-col span="3"
          ><div class="demo-col demo-col2 ">
            <h4>ปั้มบ่อปรับสภาพ 1</h4>
          </div></fish-col
        >
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpadjuct1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div><h4>ค. ไม่สั้นสะเทือน</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>1. ความสูงของตะกอน</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-04</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มบ่อปรับสภาพ 2</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpadjuct2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpadjuct2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1"
          ><div><h4>ง. ไม่อุดตัน</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(0.9-1.25 เมตร)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h5>บ่อตะกอน</h5></div>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pondhight1" hint="เมตร"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pondhight2" hint="เมตร"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-05</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 1</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpsediment1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              จ. ระดับจารบีเพียงพอ
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h4>2. สะภาพของตะกอน</h4>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-06</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มสูบตะกอน 2</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpsediment2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpsediment2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1"
          ><div>
            <h4>
              ให้ลงเครื่องหมาย<i class="material-icons white-text">done</i>
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4"
          ><div class="demo-col demo-col2 ">
            <h5>(จมตัวดี,ไม่ลอยตัว)</h5>
          </div>
        </fish-col>
        <fish-col span="1"
          ><div class="demo-col demo-col2 "><h5>บ่อตะกอน</h5></div>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="sediment1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="sediment2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-07</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 1</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcrolene1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>ถ้าไม่ใช่ปล่อยว่างไว้</h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col3 "><h4>คลองคลอรีน</h4></div>
        </fish-col>
        <fish-col span="5"
          ><div class="demo-col demo-col2"><h4>ผลตรวจ</h4></div></fish-col
        >
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>P-08</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>ปั้มคลอรีน 2</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcrolene2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcrolene2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ถ้าไม่ได้ใช้งานลง<i class="material-icons white-text">done</i
              >ไม่ได้ใช้งาน
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>1. คลอรีนตกค้าง</h4>
          </div>
        </fish-col>

        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-09</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>โพลีเมอร์ (Polymer)</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="polymer1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="polymer2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="polymer3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1"
          ><div><h4>2. เมื่อทำความสะอาด</h4></div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h5>(0.5-1.5 ppm)</h5>
          </div>
        </fish-col>

        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="ppm1" hint="ppm"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="ppm2" hint="ppm"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-10</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h5>ปั้มสูบเครื่องรีดตะกอน</h5></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="rolled1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="rolled2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="rolled3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              แล้วให้ลงเครื่องหมาย
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h5>2.สภาพน้ำที่ออกจากระบบ(ใส่,ไม่มีตะกอน)</h5>
          </div>
        </fish-col>

        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="water1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="water2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2" offset="1">
          <div class="demo-col demo-col2 "><h4>P-11</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h5>ปั้มตะกอนส่วนเกิน</h5></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpexcess1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpexcess2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpexcess3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              3. เมื่อเปลี่ยนน้ำยา
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h5>3.เวลาที่น้พเสียสัมผัสคลอรีนก่อนออกระบบ</h5>
          </div>
        </fish-col>

        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="wastewater1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="wastewater2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="5" offset="1">
          <div class="demo-col demo-col2 "><h4>เครื่องเติมอากาศ</h4></div>
        </fish-col>
        <fish-col span="4">
          <div class="demo-col demo-col2 "><h4>ตรวจสอบ</h4></div>
        </fish-col>

        <fish-col span="4" offset="1">
          <div>
            <h4>
              คลอรีนทุกครั้งให้
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col3 ">
            <h5>การวัดมิเตอร์</h5>
          </div>
        </fish-col>

        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>เลขที่</h4>
          </div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-01</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="1">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="1">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ลงบันทึก วัน เดือน ปี
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>1. มิเตอร์ไฟฟ้า</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="meter" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-02</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="1">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="1">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col4 "><h4>-</h4></div>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ที่เปลี่ยน
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>2. มิเตอร์ปั้มสูบน้ำเสีย 1</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="meterfailed1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-03</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>บ่อเติมอากาศ 3</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="aeration1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="aeration1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="aeration1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              4. เมื่อวัดหรือทดสอบ
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>3. มิเตอร์ปั้มสูบน้ำเสีย 2</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="meterfailed1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-04</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>บ่อเติมอากาศ 4</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="aeration2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="aeration2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="aeration2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ค่าต่างๆ ให้ลงใน
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>อัตราการสูบน้ำ 08.00 น.มีค่าเท่ากับ</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pumping1" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-05</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>บ่อปรับสภาพ 1</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcondition1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcondition1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcondition1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ช่องนั้นๆ
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>อัตราการสูบน้ำ 12.00 น.มีค่าเท่ากับ</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pumping2" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="2">
          <div class="demo-col demo-col2 "><h4>A-06</h4></div>
        </fish-col>
        <fish-col span="3">
          <div class="demo-col demo-col2 "><h4>บ่อปรับสภาพ 2</h4></div>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcondition2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="pumpcondition2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="pumpcondition2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              5. ในแต่ละวัน ถ้ามี
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5"
          ><div class="demo-col demo-col2 ">
            <h4>อัตราการสูบน้ำ 16.00 น.มีค่าเท่ากับ</h4>
          </div>
        </fish-col>

        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="pumping3" hint="ผล"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <fish-col span="5">
          <div class="demo-col demo-col2 "><h4>การทำความสะอาด</h4></div>
        </fish-col>

        <fish-col span="4">
          <div class="demo-col demo-col2 "><h4>ทำ</h4></div>
        </fish-col>

        <fish-col span="4" offset="1">
          <div>
            <h4>
              เหตุการณ์ใดเกิดขึ้น
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="10">
          <div class="demo-col demo-col3 "><h4>สภาพภูมิอากาศ</h4></div>
        </fish-col>

        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>1. ล้างเครื่องดักขยะของบ่อสูบ</h4>
          </div>
        </fish-col>

        <fish-col span="1">
          <enhanced-check
            v-model="cleantrap1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="cleantrap1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="cleantrap1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ให้ลงในช่องบันทึก
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>-มีฝนตก นานกี่ชม กี่นาที</h4>
          </div>
        </fish-col>
        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="rainning" hint="ระบุ"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>

        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>2. ล้างเครื่องดักขยะบ่อปรับฯ</h4>
          </div>
        </fish-col>

        <fish-col span="1">
          <enhanced-check
            v-model="cleantrap2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="cleantrap2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="cleantrap2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              เพิ่มเติมและโทรแจ้ง
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>-ปริมาณน้ำฝนที่ตก น้อย,ปานกลาง,มาก</h4>
          </div>
        </fish-col>
        <fish-col span="5">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="volume" hint="ระบุ"></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>

        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>3. เก็บขยะจากบ่อตกตะกอน 1</h4>
          </div>
        </fish-col>

        <fish-col span="1">
          <enhanced-check
            v-model="storetrap1_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="storetrap1_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="storetrap1_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              ที่เบอร์ 1925
            </h4>
          </div>
        </fish-col>
      </fish-row>
      <fish-divider></fish-divider>
      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col3 "><h4>การตรวจสอบถังคลอรีน</h4></div>
        </fish-col>
        <fish-col span="5">
          <div class="demo-col demo-col2 "><h4>เวลาที่เปลี่ยน</h4></div>
        </fish-col>

        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>4. เก็บขยะจากบ่อตกตะกอน 2</h4>
          </div>
        </fish-col>

        <fish-col span="1">
          <enhanced-check
            v-model="storetrap2_1"
            label="เช้า"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="1">
          <enhanced-check
            v-model="storetrap2_2"
            label="บ่าย"
            subClass="primary"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="2">
          <enhanced-check
            v-model="storetrap2_3"
            label="ไม่ได้ใช้งาน"
            subClass="danger"
            animate="true"
          ></enhanced-check>
        </fish-col>
        <fish-col span="4" offset="1">
          <div>
            <h4>
              เวชกรรมสังคมทุกครั้ง
            </h4>
          </div>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>1. น้ำยาคลอรีนในถัง 1</h4>
          </div>
        </fish-col>
        <fish-col span="5">
          <fish-time-picker
            v-model="input.chlorineintank1"
            hint="ระบุเวลา"
          ></fish-time-picker>
        </fish-col>

        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>จำนวนขยะต่อวัน (กก)</h4>
          </div>
        </fish-col>

        <fish-col span="8">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input v-model="garbage" hint="กก."></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
      </fish-row>

      <fish-row gutter=".5">
        <fish-col span="5">
          <div class="demo-col demo-col2 ">
            <h4>2. น้ำยาคลอรีนในถัง 2</h4>
          </div>
        </fish-col>
        <fish-col span="5">
          <!-- <fish-input v-model="chlorineintank2" hint="ระบุ"></fish-input> -->
          <fish-time-picker
            v-model="input.chlorineintank2"
            hint="ระบุเวลา"
          ></fish-time-picker>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="24">
          <h4>บันทึกเพิ่มเติม</h4>
          <fish-input
            size="large"
            type="textarea"
            style="height: 80px;  width: 100%; "
            v-model="others"
            hint="ระบุ"
          ></fish-input>
        </fish-col>
      </fish-row>
      <fish-row gutter=".5">
        <fish-col span="4" offset="21">
          <fish-form ref="form">
            <fish-fields>
              <fish-field>
                <fish-input
                  v-model="woker"
                  label="ผู้ดูแล "
                  hint="ระบุ"
                ></fish-input>
              </fish-field>
            </fish-fields>
          </fish-form>
        </fish-col>
        <div class="input-wrapper">
          <PincodeInput v-model="code" placeholder="0" />
        </div>
      </fish-row>
    </fish-card>
  </div>
</template>
<script>
import { EnhancedCheck } from "vue-enhanced-check";
export default {
  name: "dayform",
  data() {
    return {
      input: {
        dateservice: "",
        pondcolor1: "",
        pondcolor2: "",
        trap1: "",
        trap2: "",
        trap3: "",
        pumpfailed1_1: "",
        pumpfailed1_2: "",
        pumpfailed1_3: "",
        pumpfailed2_1: "",
        pumpfailed2_2: "",
        pumpfailed2_3: "",
        pumpadjuct1_1: "",
        pumpadjuct1_2: "",
        pumpadjuct1_3: "",
        pumpadjuct2_1: "",
        pumpadjuct2_2: "",
        pumpadjuct2_3: "",
        pondhight1: "",
        pondhight2: "",
        pumpsediment1_1: "",
        pumpsediment1_2: "",
        pumpsediment1_3: "",
        pumpsediment2_1: "",
        pumpsediment2_2: "",
        pumpsediment2_3: "",
        sediment1: "",
        sediment2: "",
        pumpcrolene1_1: "",
        pumpcrolene1_2: "",
        pumpcrolene1_3: "",
        pumpcrolene2_1: "",
        pumpcrolene2_2: "",
        pumpcrolene2_3: "",
        polymer1: "",
        polymer2: "",
        polymer3: "",
        ppm1: "",
        ppm2: "",
        rolled1: "",
        rolled2: "",
        rolled3: "",
        water1: "",
        water2: "",
        pumpexcess1: "",
        pumpexcess2: "",
        pumpexcess3: "",
        wastewater1: "",
        wastewater2: "",
        meter: "",
        meterfailed1: "",
        meterfailed2: "",
        aeration1_1: "",
        aeration1_2: "",
        aeration1_3: "",
        aeration2_1: "",
        aeration2_2: "",
        aeration2_3: "",
        pumping1: "",
        pumping2: "",
        pumping3: "",
        pumpcondition1_1: "",
        pumpcondition1_2: "",
        pumpcondition1_3: "",
        pumpcondition2_1: "",
        pumpcondition2_2: "",
        pumpcondition2_3: "",
        cleantrap1_1: "",
        cleantrap1_2: "",
        cleantrap1_3: "",
        cleantrap2_1: "",
        cleantrap2_2: "",
        cleantrap2_3: "",
        rainning: "",
        volume: "",
        storetrap1_1: "",
        storetrap1_2: "",
        storetrap1_3: "",
        storetrap2_1: "",
        storetrap2_2: "",
        storetrap2_3: "",
        chlorineintank1: "",
        chlorineintank2: "",
        garbage: "",
        others: "",
        woker: ""
      }
    };
  },
  components: {
    EnhancedCheck
  }
};
</script>
<style scoped>
.demo-col {
  padding: 10px 0;
  text-align: center;
  margin-bottom: 5px;
}
.demo-col2 {
  background: MEDIUMAQUAMARINE;
}
.demo-col3 {
  background: orange;
}
.demo-col4 {
  background: navy;
}
.head {
  font-family: "Sriracha";
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: "Sriracha";
  text-shadow: 2px 2px 2px #aaa;
}
.left {
  text-align: left;
}
</style>
