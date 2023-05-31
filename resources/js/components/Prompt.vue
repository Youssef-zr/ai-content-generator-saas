<template>
  <!-- start row -->
  <div class="row">
    <!-- start form fields -->
    <div class="col-md-6">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-magic mr-1"></i> {{ prompt.title }}
          </h3>
        </div>
        <div class="card-body">
          <!-- questions  fields -->
          <div v-for="($question, $key) in questions" :key="$key">
            <!-- question  field -->
            <div class="form-group">
              <div class="option">
                <label class="form-label">{{ $question.question }}</label>
                <span
                  v-if="$question.is_required == 'required'"
                  class="star text-danger"
                  >*</span
                >
              </div>

              <input
                type="text"
                class="form-control"
                v-if="$question.type == 'single_line'"
              />
              <textarea
                cols="30"
                rows="3"
                class="form-control"
                v-else
              ></textarea>
            </div>
          </div>

          <!-- tone field -->
          <div class="form-group">
            <label for="tone_id" class="form-label">Tone</label>
            <select name="tone_id" class="form-control">
              <option
                v-for="(tone, index) in tones"
                :key="index"
                :value="tone"
                :selected="index == prompt.tone_id ? true : false"
              >
                {{ tone }}
              </option>
            </select>
          </div>

          <!-- language field -->
          <div class="form-group">
            <label for="language_id" class="form-label">Language</label>
            <select name="language_id" class="form-control">
              <option
                v-for="(language, index) in languages"
                :key="index"
                :value="language"
              >
                {{ language }}
              </option>
            </select>
          </div>

          <!-- submit button -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-plus-circle"></i>
              Create Content
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  prompt: {
    type: Object,
    default: () => {},
  },
  questions: {
    type: Array,
    default: () => [],
  },
  tones: {
    type: Array,
    default: () => [],
  },
  languages: {
    type: Array,
    default: () => [],
  },
  userSetting: {
    type: Object,
    default: () => {},
  },
});
</script>
