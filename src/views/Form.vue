<template>
  <div>
    <vue-scroll-progress-bar @complete="handleComplete" height="1rem" />
    <fish-card fluid color="blue">
      <div slot="header">
        <h3 class="head">
          <vue-fontawesome icon="copy" size="2"></vue-fontawesome
          >ใบตรวจเช็คบำรุงรักษา
        </h3>
      </div>
      <fish-form ref="form">
        <fish-row>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field
                label="ทุก..เดือน  ต่อ 1 บ่อ / 1ปี"
                name="month"
                :rules="[{ required: true, message: 'วันที่เป็นค่าว่าง' }]"
                inline
              >
                <fish-select v-model="month" hint="เดือน" @change="monthchange">
                  <fish-option index="1" content="1 เดือน"></fish-option>
                  <fish-option index="3" content="3 เดือน"></fish-option>
                </fish-select>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field label="สถานที่: " inline>
                <fish-input disabled hint="บ่อบำบัดน้ำเสีย"></fish-input>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field
                label="ยี่ห้อ"
                name="pump_brand"
                :rules="[{ required: true, message: 'ยี่ห้อเป็นค่าว่าง' }]"
                inline
              >
                <fish-select v-model="pump_brand">
                  <fish-option
                    :index="item.id"
                    :content="item.name"
                    v-for="item in pumps_brands"
                    :key="item.id"
                  ></fish-option>
                </fish-select>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field label="ON" name="on" inline>
                <fish-select v-model="on" hint="ON">
                  <fish-option index="1" content="1"></fish-option>
                  <fish-option index="2" content="2"></fish-option>
                </fish-select>
              </fish-field>
            </fish-form>
          </fish-col>
        </fish-row>
        <fish-row>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field
                label="หมายเลขเครื่อง / รุ่น"
                name="pump"
                :rules="[
                  {
                    required: true,
                    message: 'หมายเลขเครื่อง / รุ่น เป็นค่าว่าง'
                  }
                ]"
                inline
              >
                <fish-select v-model="pump" @change="pumpchange">
                  <fish-option
                    :index="item.id"
                    :content="item.name"
                    v-for="item in pumps"
                    :key="item.id"
                  ></fish-option>
                </fish-select>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field label="ID:" name="id" inline>
                <fish-input v-model="id" hint="id"></fish-input>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form inline>
              <fish-field
                label="จุดติดตั้ง"
                name="install_point"
                :rules="[{ required: true, message: 'จุดติดตั้งเป็นค่าว่าง' }]"
                inline
              >
                <fish-select v-model="install_point">
                  <fish-option
                    :index="item.id"
                    :content="item.name"
                    v-for="item in install_points"
                    :key="item.id"
                  ></fish-option>
                </fish-select>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col">
            <fish-form ref="form" inline>
              <fish-field
                label="วันที่"
                name="dateservice"
                :rules="[{ required: true, message: 'จุดติดตั้งเป็นค่าว่าง' }]"
                inline
              >
                <!-- format from moment js L = DD/MM/YYYY -->
                <fish-date-picker
                  v-model="dateservice"
                  hint="ระบุวันที่"
                  format="L"
                ></fish-date-picker>
              </fish-field>
            </fish-form>
          </fish-col>
        </fish-row>
         <fish-row class="headsmall">
              <fish-col span="5" class="demo-col demo-col2">
                <h4>รายการ</h4>
              </fish-col>
              <fish-col span="6" class="demo-col demo-col2">
                <h4>แนวทางการตรวจเช็ค</h4>
              </fish-col>
              <fish-col span="7" class="demo-col demo-col2">
                <h4>สถานะ</h4>
              </fish-col>
              <fish-col span="6" class="demo-col demo-col2">
                <h4>หมายเหตุ</h4>
              </fish-col>
            </fish-row>
            <!-- แถว1 -->
            <fish-row v-show="p1_show">
              <fish-col span="4">
                <fish-form inline>
                  <h5>
                    <vue-fontawesome icon="arrow-right"></vue-fontawesome>
                    ชุดสายไฟเครื่องปั้ม
                  </h5>
                </fish-form>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูสภาพของสาย
                  จุดจับยึด
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="wire_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="wire_3">
                  <fish-divider />
                  <fish-checkbox index="1">สายรั่ว</fish-checkbox>
                </fish-checkboxes>
                 <fish-divider />
                <fish-checkboxes v-model="wire_5">
                  <fish-checkbox index="1">แจ้งหัวหน้า</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="wire_2">
                  <fish-checkbox index="1"> สายขาด</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="wire_4">
                  <fish-divider />
                  <fish-checkbox index="1">เปลี่ยน</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="wire_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p1_show" />
             <!-- แถว2 -->
            <fish-row v-show="p2_show">
              <fish-col span="4">
                <fish-form inline>
                  <h5>
                    <vue-fontawesome icon="arrow-right"></vue-fontawesome>
                    ตรวจสอบการ ทำงานของเครื่อง
                  </h5>
                </fish-form>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูปริมาณน้ำที่ออกจากท่อ  เมื่อเครื่องทำงาน
                
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="service_1">
                  <fish-checkbox index="1">ปกติ / พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="service_3">
                  <fish-divider />
                  <fish-checkbox index="1">ปานกลาง</fish-checkbox>
                </fish-checkboxes>
                 <fish-divider />
                <fish-checkboxes v-model="service_5">
                  <fish-checkbox index="1">น้อย</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="service_2">
                  <fish-checkbox index="1"> ไม่ออก/มีเสียงดัง</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="service_4">
                  <fish-divider />
                  <fish-checkbox index="1">ทำการซ่อม</fish-checkbox>
                </fish-checkboxes>
                  <fish-divider />
                <fish-checkboxes v-model="service_6">
                  <fish-checkbox index="1">แจ้งหัวหน้า</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="service_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p2_show" />
            <!-- แถว3 -->
            <fish-row v-show="p3_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ซีลเครื่องปั้ม
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  สังเกตุด้วยสายตา ดูว่ามีการรั่วของน้ำ ความซึกหรอ
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="seal_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="seal_3">
                  <fish-divider />
                  <fish-checkbox index="1">ชำรุด</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="seal_2">
                  <fish-checkbox index="1"> มีรอยรั่วซึม</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="seal_4">
                  <fish-divider />
                  <fish-checkbox index="1">ส่งซ่อมบริษัท</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="seal_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p3_show" />
            <!-- แถว4 -->
            <fish-row v-show="p4_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >สภาพโดยรวม ของเครื่อง
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูสี จุดแตกร้าว
                  การกัดกรอน น๊อต/สกรู การสั่นสะเทือน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="condition_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="condition_3">
                  <fish-divider />
                  <fish-checkbox index="1">แตกร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="condition_5">
                  <fish-divider />
                  <fish-checkbox index="1">ทาสีใหม่</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="condition_2">
                  <fish-checkbox index="1"> เปลี่ยนน๊อต/สกรู</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="condition_4">
                  <fish-divider />
                  <fish-checkbox index="1">มีการกัดกร่อน</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="condition_6">
                  <fish-divider />
                  <fish-checkbox index="1">ส่งซ่อมบริษัท</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="condition_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p4_show" />
            <!-- แถว5 -->
            <fish-row v-show="p5_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ชุดใบพัดปั้ม
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  ดูจุดแตกร้าว ซึกหรอ การหมุน การสั่นสะเทือน เสียงดัง การกัดกรอน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="propeller_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="propeller_3">
                  <fish-divider />
                  <fish-checkbox index="1">แตกร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="propeller_5">
                  <fish-divider />
                  <fish-checkbox index="1">สึกหรอ</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="propeller_2">
                  <fish-checkbox index="1"> สันสะเทือน/เสียงดัง</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="propeller_4">
                  <fish-divider />
                  <fish-checkbox index="1">มีการกัดกร่อน</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="propeller_6">
                  <fish-divider />
                  <fish-checkbox index="1">ส่งซ่อมบริษัท</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="propeller_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p5_show" />
            <!-- แถว6-->
            <fish-row v-show="p6_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >หอยโข่งปั้ม
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูจุดแตกร้าว
                  ซึกหรอ การกัดกรอน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="snail_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="snail_3">
                  <fish-divider />
                  <fish-checkbox index="1">แตกร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="snail_5">
                  <fish-divider />
                  <fish-checkbox index="1">สึกหรอ</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="snail_2">
                  <fish-checkbox index="1">มีรอยร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="snail_4">
                  <fish-divider />
                  <fish-checkbox index="1">มีการกัดกร่อน</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="snail_6">
                  <fish-divider />
                  <fish-checkbox index="1">อุดตัน</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="snail_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p6_show" />
            <!-- แถว7-->
            <fish-row v-show="p7_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ระดับน้ำมันเครื่อง
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  ดูระดับน้ำมันเครื่อง สีของน้ำมัน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="oil_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="oil_3">
                  <fish-divider />
                  <fish-checkbox index="1">เติม</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="oil_5">
                  <fish-divider />
                  <fish-checkbox index="1">เปลี่ยน</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="oil_2">
                  <fish-checkbox index="1">ต่ำกว่าระดับ</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="oil_4">
                  <fish-divider />
                  <fish-checkbox index="1">สีดำ/ค้น</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="oid_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p7_show" />
            <!-- แถว8-->
            <fish-row v-show="p8_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >อัดจาระบี
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  อัดจารบีตามจุดต่างๆ
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="jarabi_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="jarabi_2">
                  <fish-checkbox index="1">อัดจารบี</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="jarabi_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p8_show" />
            <!-- แถว9-->
            <fish-row v-show="p9_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ทำความสะอาด
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูคราบสกปรก
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="clean_1">
                  <fish-checkbox index="1">ฉีดน้ำใช้แปรงขัด</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="clean_3">
                  <fish-divider />
                  <fish-checkbox index="1">ใช้โบว์เวอร์เปา</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="clean_2">
                  <fish-checkbox index="1">ใช้ปั้มแรงดัน</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="clean_4">
                  <fish-divider />
                  <fish-checkbox index="1">ใช้ผ้าชุบน้ำเช็ด</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="clean_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p9_show" />
            <!-- แถว10-->
            <fish-row v-show="p10_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ชุดแขนของเครื่อง กวาดตะกอน
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  ดูการหมุนของแขนกวาดตะกอน น๊อต/สกรู การสั่นสะเทือน เสียงดัง
                  การกัดกร่อน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="arm_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="arm_3">
                  <fish-divider />
                  <fish-checkbox index="1">ชำรุด</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="arm_5">
                  <fish-divider />
                  <fish-checkbox index="1">ทาสีใหม่</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="arm_2">
                  <fish-checkbox index="1">เปลี่ยนน๊อต/สกรู</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="arm_4">
                  <fish-divider />
                  <fish-checkbox index="1">สึกหรอ/เป็นสนิม</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="arm_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p10_show" />
            <!-- แถว11-->
            <fish-row v-show="p11_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ตรวจเช็คระบบ ควบคุมปั้ม
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome>
                  ตรวจเช็คอุปกรณ์/ทำความสะอาด
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="system_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="system_3">
                  <fish-divider />
                  <fish-checkbox index="1">เปลี่ยนอุปกรณ์</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="system_5">
                  <fish-divider />
                  <fish-checkbox index="1"
                    >ตรวจเช๊ค AUTO MAN ON OFF ตู้ควบคุม</fish-checkbox
                  >
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="system_2">
                  <fish-checkbox index="1">ตรวจเช็คไฟโชว์</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="system_4">
                  <fish-divider />
                  <fish-checkbox index="1"
                    >ใช้โบว์เป้าทำความสะอาด</fish-checkbox
                  >
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px; "
                    v-model="system_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p11_show" />
            <!-- แถว12-->
            <fish-row v-show="p12_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ตรวจสอบบ่อ
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ความสกปรก ขยะ
                  รอยร้าวของบ่อ สภาพโดยรวม
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="sump_1">
                  <fish-checkbox index="1">มีรอยร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_3">
                  <fish-divider />
                  <fish-checkbox index="1">ตักเอาขยะออก</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_5">
                  <fish-divider />
                  <fish-checkbox index="1">ฉีดน้ำใช้แปรงขัด</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_7">
                  <fish-divider />
                  <fish-checkbox index="1">ใช้ปั้มแรงดันฉีด</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="sump_2">
                  <fish-checkbox index="1">แจ้งหัวหน้า</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_4">
                  <fish-divider />
                  <fish-checkbox index="1">ดูดเลนด้วยไดโว่</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_6">
                  <fish-divider />
                  <fish-checkbox index="1">ทำการซ่อมแซม</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="sump_8">
                  <fish-divider />
                  <fish-checkbox index="1">แจ้งบริษัท</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px;  "
                    v-model="sump_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <fish-divider v-show="p12_show" />
            <!-- แถว13-->
            <fish-row v-show="p13_show">
              <fish-col span="4">
                <h5>
                  <vue-fontawesome icon="arrow-right"></vue-fontawesome
                  >ตรวจเช็คถังคลอรีน จุดต่อสาย
                </h5>
              </fish-col>
              <fish-col span="7">
                <h5>
                  <vue-fontawesome icon="bug"></vue-fontawesome> ดูรอยแตก
                  สภาพของถัง จุดต่อของสายคลอรีน
                </h5>
              </fish-col>
              <fish-col span="4">
                <fish-checkboxes v-model="chlorine_1">
                  <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="chlorine_3">
                  <fish-divider />
                  <fish-checkbox index="1">แตกร้าว</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="chlorine_5">
                  <fish-divider />
                  <fish-checkbox index="1">มีการกัดกร่อน</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="3">
                <fish-checkboxes v-model="chlorine_2">
                  <fish-checkbox index="1">เปลี่ยนถัง</fish-checkbox>
                </fish-checkboxes>
                <fish-checkboxes v-model="chlorine_4">
                  <fish-divider />
                  <fish-checkbox index="1">เปลี่ยนสายคลอรีน</fish-checkbox>
                </fish-checkboxes>
              </fish-col>
              <fish-col span="6">
                <center>
                  <fish-input
                    type="textarea"
                    style="height: 80px;  "
                    v-model="chlorine_other"
                    hint="ระบุ"
                  ></fish-input>
                </center>
              </fish-col>
            </fish-row>
            <br />
            <fish-divider v-show="p13_show" />
        
      
        <fish-row>
          <fish-col span="24">
            <fish-card color="blue" fluid>
              <div slot="header">
                <strong class="headsmall">ผู้ปฏิบัติงาน</strong>
              </div>
              <fish-row>
                <fish-col span="8">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="woker"
                    hint="ชื่อ-นามสกุล"
                    disabled
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <h4>สรุปผลการตรวจเช็ค</h4>
                  <fish-switch
                    v-model="woker_approve"
                    :yesOrNo="[1, 0]"
                  ></fish-switch>
                </fish-col>
                <fish-col span="8">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="woker_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
          </fish-col>
        </fish-row>
        <br />
        <fish-divider v-show="p12_show" />
        <fish-row>
          <fish-col span="2">
            <fish-button type="primary" @click="submitHandler">
              <vue-fontawesome icon="save" size="2"></vue-fontawesome
              >บันทึก</fish-button
            >
          </fish-col>
          <fish-col span="2">
            <fish-button type="negative">
              <vue-fontawesome icon="eraser" size="2"></vue-fontawesome
              >ยกเลิก</fish-button
            >
          </fish-col>
        </fish-row>
      </fish-form>
    </fish-card>
    <br />
    <fish-row>
      <fish-col span="24">
        <fish-card color="blue" fluid>
          <div slot="header"><strong class="headsmall">ผู้ตรวจสอบ</strong></div>
          <fish-card color="red" fluid>
            <div slot="header">
              <strong class="headsmall">หัวหน้าประปา สุขาภิบาล</strong>
            </div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input
                  size="large"
                  v-model="boss_pump"
                  hint="ชื่อ-นามสกุล"
                  disabled
                ></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch
                    v-model="boss_pump_approve"
                    :yesOrNo="[1, 0]"
                  ></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input
                  size="large"
                  type="textarea"
                  style="height: 80px;  width: 100%; "
                  v-model="boss_pump_other"
                  hint="ระบุ"
                ></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
          <br />
          <fish-cards cols="two">
            <fish-card color="green">
              <div slot="header">
                <strong class="headsmall">ผู้ตรวจสอบ</strong>
              </div>
              <fish-row>
                <fish-col span="6">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="inspector"
                    hint="ชื่อ-นามสกุล"
                    disabled
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <center>
                    <h4>ตรวจสอบแล้ว</h4>
                    <fish-switch
                      v-model="inspector_approve"
                      :yesOrNo="[1, 0]"
                    ></fish-switch>
                  </center>
                </fish-col>
                <fish-col span="12">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="inspector_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
            <fish-card color="green">
              <div slot="header">
                <strong class="headsmall">รองผู้อำนวยการฝ่ายบริหาร</strong>
              </div>
              <fish-row>
                <fish-col span="6">
                  <h4>ชื่อ-นามสกุล</h4>
                  <fish-input
                    size="large"
                    v-model="manage"
                    hint="ชื่อ-นามสกุล"
                  ></fish-input>
                </fish-col>
                <fish-col span="6">
                  <center>
                    <h4>ตรวจสอบแล้ว</h4>
                    <fish-switch
                      v-model="manage_approve"
                      :yesOrNo="[1, 0]"
                    ></fish-switch>
                  </center>
                </fish-col>
                <fish-col span="12">
                  <h4>หมายเหตุ</h4>
                  <fish-input
                    size="large"
                    type="textarea"
                    style="height: 80px;  width: 100%; "
                    v-model="manage_other"
                    hint="ระบุ"
                  ></fish-input>
                </fish-col>
              </fish-row>
            </fish-card>
          </fish-cards>
          <br />
          <fish-row>
            <fish-col span="2">
              <fish-button type="positive" @click="submitHandler">
                <vue-fontawesome icon="save" size="2"></vue-fontawesome>
                บันทึก</fish-button
              >
            </fish-col>
          </fish-row>
        </fish-card>
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "form",
  data() {
    return {
       api_path:'http://192.168.5.187/0161/pump/pump/api/',
      //api_path:'http://localhost/pump/pump/api/',
      tab: "",
      p1_show: true,
      p2_show: true,
      p3_show: true,
      p4_show: true,
      p5_show: true,
      p6_show: true,
      p7_show: true,
      p8_show: true,
      p9_show: true,
      p10_show: true,
      p11_show: true,
      p12_show: true,
      no: false,
      month: "",
      on: "",
      pumps: "",
      pump: "",
      pumps_brands: "",
      pump_brand: "",
      id: "",
      install_points: "",
      install_point: "",
      dateservice: "",
      wire_1: "",
      wire_2: "",
      wire_3: "",
      wire_4: "",
      wire_5: "",
      wire_other: "",
      service_1: "",
      service_2: "",
      service_3: "",
      service_4: "",
      service_5: "",
      service_6: "",
      service_other: "",
      seal_1: "",
      seal_2: "",
      seal_3: "",
      seal_4: "",
      seal_other: "",
      condition_1: "",
      condition_2: "",
      condition_3: "",
      condition_4: "",
      condition_5: "",
      condition_6: "",
      condition_other: "",
      propeller_1: "",
      propeller_2: "",
      propeller_3: "",
      propeller_4: "",
      propeller_5: "",
      propeller_6: "",
      propeller_other: "",
      snail_1: "",
      snail_2: "",
      snail_3: "",
      snail_4: "",
      snail_5: "",
      snail_6: "",
      snail_other: "",
      oil_1: "",
      oil_2: "",
      oil_3: "",
      oil_4: "",
      oil_5: "",
      oil_other: "",
      arm_1: "",
      arm_2: "",
      arm_3: "",
      arm_4: "",
      arm_5: "",
      arm_other: "",
      system_1: "",
      system_2: "",
      system_3: "",
      system_4: "",
      system_5: "",
      system_other: "",
      sump_1: "",
      sump_2: "",
      sump_3: "",
      sump_4: "",
      sump_5: "",
      sump_6: "",
      sump_7: "",
      sump_8: "",
      sump_other: "",
      chlorine_1: "",
      chlorine_2: "",
      chlorine_3: "",
      chlorine_4: "",
      chlorine_5: "",
      chlorine_other: "",
      woker: "",
      woker_approve: "",
      woker_other: "",
      boss_pump: "",
      boss_pump_approve: "",
      boss_pump_other: "",
      inspector: "",
      inspector_approve: "",
      inspector_other: "",
      manage: "",
      manage_approve: 0,
      manage_other: ""
    };
  },
  methods: {
    submitHandler() {
      this.$refs.form.validate(valid => {
        // console.log(valid);
        if (valid === false) {
          this.$message.error("แจ้งเตือน: ท่านยังกรอกข้อมูลไม่ครบ", 5000);
        } else {
          this.$message.success("สำเร็จ:ข้อมูลถูกบันทึกเรียบร้อย", 5000);
        }
      });
    },

    
   
    //เลิอกหมายเลขเครื่อง / รุ่น
    pumpchange() {
      if (this.pump == "1" && this.month == "3") {
        
        this.p2_show = false;
       
        
       
        
        this.p8_show = false;
       
        this.p10_show = false;
       
        this.p13_show = false;
      } else if (this.pump == "2" && this.month == "3") {
      
        this.p2_show = false;
      
        
        this.p5_show = false;
        this.p6_show = false;
       
        this.p8_show = false;
        
        this.p10_show = false;
      
        this.p13_show = false;
      } else if (this.pump == "3" && this.month == "3") {
      
        this.p2_show = false;
       
        this.p8_show = false;
      
        this.p10_show = false;
       
        this.p13_show = false;
      } else if (this.pump == "4" && this.month == "3") {
     
        this.p2_show = false;
       
      
        this.p5_show = false;
        this.p6_show = false;
      
        this.p8_show = false;
       
        this.p10_show = false;
      
     
        this.p13_show = false;
      } else if (this.pump == "5" && this.month == "3") {
      
        this.p2_show = false;
   
      
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
     
        this.p10_show = false;
      
        this.p12_show = false;
    
      } else if (this.pump == "6" && this.month == "3") {
     
        this.p2_show = false;
     
     
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
     
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
      
      } else if (this.pump == "7" && this.month == "3") {
   
        this.p2_show = false;
      
     
        this.p10_show = false;
       
        this.p13_show = false;
      } else if (this.pump == "8" && this.month == "3") {
      
        this.p2_show = false;
        this.p3_show = false;
     
        this.p5_show = false;
        this.p6_show = false;
     
      
    
        this.p13_show = false;
      } else if (this.pump == "9" && this.month == "3") {
     
        this.p2_show = false;
        this.p3_show = false;
   
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
    
        this.p10_show = false;
   
        this.p13_show = false;
      } else if(this.pump == "1" && this.month == "1"){
      
       
        
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
       
        this.p13_show = false;
        
        
      }else if (this.pump == "2" && this.month == "1") {
         
       
       
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        
        this.p13_show = false;
      } else if (this.pump == "3" && this.month == "1") {
          
       
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
       
        this.p13_show = false;
      } else if (this.pump == "4" && this.month == "1") {
          
        
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        
        this.p13_show = false;
      } else if (this.pump == "5" && this.month == "1") {
          
      
        this.p2_show = false;
       
       
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
      
        this.p10_show = false;
       
        this.p12_show = false;
        
      } else if (this.pump == "6" && this.month == "1") {
          
       
        this.p2_show = false;
       
       
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
        
      } else if (this.pump == "7" && this.month == "1") {
         
        
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
       
        this.p13_show = false;
      } else if (this.pump == "8" && this.month == "1") {
         
        
        this.p2_show = false;
        this.p3_show = false;
        
        this.p5_show = false;
        this.p6_show = false;
        
       
       
        this.p13_show = false;
      } else if (this.pump == "9" && this.month == "1") {
        
       
        this.p2_show = false;
        this.p3_show = false;
        
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
       
        
        this.p10_show = false;
       
        this.p13_show = false;
      }else {
        this.p1_show = true;
        this.p2_show = true;
        this.p3_show = true;
        this.p4_show = true;
        this.p5_show = true;
        this.p6_show = true;
        this.p7_show = true;
        this.p8_show = true;
        this.p9_show = true;
        this.p10_show = true;
        this.p11_show = true;
        this.p12_show = true;
        this.p13_show = true;
      }
    }
  },
  mounted() {
    // รุ่น
    axios
  
      .get(this.api_path + "pump.php")
      .then(response => (this.pumps = response.data));
    // ยี่ห้อ
    axios
     
      .get(this.api_path + "pump_brand.php")
      .then(response => (this.pumps_brands = response.data));
    // จุดติดตั้ง
    axios

      .get(this.api_path + "hinstall_point.php")
      .then(response => (this.install_points = response.data));
  }
};
</script>

<style>
.demo-col {
  background: #e0f0fa;
  padding: 10px 0;
  text-align: center;
  margin-bottom: 5px;
}
.demo-col2 {
  background: #7dbcea;
}
.head {
  font-family: "Sriracha";
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: "Sriracha";
  text-shadow: 2px 2px 2px #aaa;
}
</style>
