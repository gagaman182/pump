<template>
  <div class="Arm">
    <fish-divider />
    <fish-row gutter=".6">
      <fish-col span="8"
        ><div class="demo-col">
          <fish-card color="orange">
            <h4>หัวหน้าประปา</h4>
            <fish-divider fitted color="orange"></fish-divider>
            <fish-row>
              <fish-col span="24">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch
                    v-model="pumpall[0].boss_approve"
                    :yesOrNo="['1', '0']"
                    disabled
                  ></fish-switch>
                </center>
              </fish-col>
            </fish-row>

            <fish-row>
              <fish-col span="24">
                <h4>หมายเหตุ</h4>
                <fish-input
                  size="large"
                  type="textarea"
                  style="height: 80px;  width: 100%; "
                  v-model="pumpall[0].boss_pump_other"
                  hint="ระบุ"
                ></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
        </div>
      </fish-col>
      <fish-col span="8"
        ><div class="demo-col">
          <fish-card color="orange">
            <h4>ผู้ตรวจสอบ</h4>
            <fish-divider fitted></fish-divider>
            <fish-row>
              <fish-col span="24">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch
                    v-model="pumpall[0].inspector_approve"
                    :yesOrNo="['1', '0']"
                    disabled
                  ></fish-switch>
                </center>
              </fish-col>
            </fish-row>

            <fish-row>
              <fish-col span="24">
                <h4>หมายเหตุ</h4>
                <fish-input
                  size="large"
                  type="textarea"
                  style="height: 80px;  width: 100%; "
                  v-model="pumpall[0].inspector_other"
                  hint="ระบุ"
                ></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
        </div>
      </fish-col>
      <fish-col span="8"
        ><div class="demo-col">
          <fish-card color="orange">
            <h4>รองผู้อำนวยการฝ่ายบริหาร</h4>
            <fish-divider fitted></fish-divider>
            <fish-row>
              <fish-col span="24">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch
                    v-model="pumpall[0].manage_approve"
                    :yesOrNo="['1', '0']"
                    disabled
                  ></fish-switch>
                </center>
              </fish-col>
            </fish-row>

            <fish-row>
              <fish-col span="24">
                <h4>หมายเหตุ</h4>
                <fish-input
                  size="large"
                  type="textarea"
                  style="height: 80px;  width: 100%; "
                  v-model="pumpall[0].manage_other"
                  hint="ระบุ"
                ></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
        </div>
      </fish-col>
    </fish-row>
    <fish-divider />
  </div>
</template>

<script>
export default {
  name: 'Approve',

  props: {
    pumpall: String,
  },
  data() {
    return {};
  },
};
</script>
